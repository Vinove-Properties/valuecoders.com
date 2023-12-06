<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename(esc_url_raw($_SERVER['SCRIPT_FILENAME'])) )
	die( 'This page cannot be called directly.' );

/**
 * @package     PublishPress\Revisions\RevisionaryElementor
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (c) 2021 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 */
class RevisionaryElementor
{	
    private $revision_id = 0;
    private $orig_post_id = 0;

    function __construct() {
        add_filter('revisionary_detect_id', [$this, 'elementorDetectID'], 10, 2);
        
        // Editor JS setup, scripts
        add_filter('elementor/document/config', [$this, 'fltPanelConfig']);
        add_filter('elementor/document/urls/wp_preview', [$this, 'fltWPpreview']);
        add_action('revisionary_queue_row_actions', [$this, 'actRevisionQueueRowActions'], 10, 2);
        add_filter('revisionary_create_revision_redirect', [$this, 'fltCreateRevisionRedirect'], 10, 2);
        add_action('wp_print_scripts', [$this, 'frontScripts']);

        // Server-side database update hooks
        add_action('elementor/widgets/widgets_registered', [$this, 'elementorMonitorQueries']);
        add_filter('revisionary_do_submission_redirect', [$this, 'elementorDisableSubmissionRedirect']);

        add_filter('posts_request', [$this, 'fltPostsRequestPastRevisions'], 10, 2);

        add_action('elementor/element/wp-page/document_settings/after_section_start', function() {
            add_filter('user_has_cap', [$this, 'fltAllowRevisionSubmission'], 10, 3);
        });

        add_action('elementor/elements/categories_registered', function() {
            add_filter('user_has_cap', [$this, 'fltAllowRevisionSubmission'], 10, 3);
        });

        add_action('elementor/document/before_save', function() {
            add_filter('user_has_cap', [$this, 'fltAllowRevisionSubmission'], 10, 3);
        });

        if (defined('WPSEO_VERSION')) { // Yoast SEO: prevent revision changes from being applied to published post without approval
            add_action('init', [$this, 'wpseoCompatWorkaround'], 11);
        }

        // Useful hooks used in past version of Revisions:
        // 'elementor/documents/ajax_save/return_data'
        // 'elementor/editor/wp_head'
    }
    
    function wpseoCompatWorkaround() {
        global $wp_filter;

        if (!empty($_REQUEST['editor_post_id']) && !empty($_REQUEST['action']) && ('elementor_ajax' == $_REQUEST['action'])) {
            foreach(['wp_insert_post', 'delete_post'] as $action) {
                foreach(array_keys($wp_filter[$action]->callbacks) as $priority) {
                    foreach(array_keys($wp_filter[$action]->callbacks[$priority]) as $wpseo_filter_key) {
                        if (false !== strpos($wpseo_filter_key, 'build_indexable')) {
                            unset($wp_filter[$action]->callbacks[$priority][$wpseo_filter_key]);
                        }
                    }
                }
            }
        }
    }

    function fltAllowRevisionSubmission($wp_blogcaps, $reqd_caps, $args) {
        $check_caps = [];

        foreach(get_post_types(['public' => true], 'object') as $type_obj) {
            if (!empty($type_obj->cap->publish_posts)) {
                $check_caps[$type_obj->cap->publish_posts] = true;
            }
        }

        if ($check_caps) {
            $wp_blogcaps = array_merge($wp_blogcaps, array_intersect_key($check_caps, array_fill_keys($reqd_caps, true)));

            // unused Elementor action: 'elementor/document/before_save'

            remove_filter('user_has_cap', [$this, 'fltAllowRevisionSubmission'], 10, 3);
        }

        return $wp_blogcaps;
    }

    function fltCreateRevisionRedirect($url, $post_id) {
        if (!empty($_REQUEST['front'])) {
            $url = admin_url("post.php?post=$post_id&action=elementor");
        }

        return $url;
    }

    function elementorDetectID($id, $args) {
        $args = (array) $args;

        if (!empty($args['is_ajax']) && !empty($_REQUEST['action']) && ('elementor_ajax' == $_REQUEST['action']) && !empty($_REQUEST['editor_post_id']) && did_action('elementor/db/before_save')) {
            if (!empty($_REQUEST['actions'])) {
                $requests = json_decode( stripslashes(sanitize_text_field($_REQUEST['actions'])), true );

                if (!empty($requests['save_builder'])) {
                    $id = (int) $_REQUEST['editor_post_id'];
                }
            }
        }

        return $id;
    }

    function fltPanelConfig($config) {
        if ($post_id = rvy_detect_post_id()) {
            if ($revision_status = rvy_in_revision_workflow($post_id)) {
                if ('draft-revision' == rvy_in_revision_workflow($post_id)) {
                    $config['panel']['messages']['publish_notification'] = pp_revisions_status_label('pending-revision', 'submitted');
                } elseif (current_user_can('edit_post', rvy_post_id($post_id))) {
                    $config['panel']['messages']['publish_notification'] = esc_html__('Approval done.', 'revisionary');
                } else {
                    $config['panel']['messages']['publish_notification'] = esc_html__('Revision updated.', 'revisionary');
                }

                // @todo: generic revisions top bar ?
                $config['urls']['preview'] = add_query_arg('rvy_embed', 1, add_query_arg('elementor-preview', $post_id, rvy_preview_url($post_id)));

                $config['urls']['wp_preview'] = rvy_preview_url($post_id);
                $config['urls']['permalink'] = rvy_preview_url($post_id);
                $config['urls']['have_a_look'] = rvy_preview_url($post_id);
            }
        }

        return $config;
    }

    function fltWPpreview($url) {
        if ($post_id = rvy_detect_post_id()) {
            if (rvy_in_revision_workflow($post_id)) {
                $url = rvy_preview_url($post_id);
            }
        }

        return $url;
    }

    function actRevisionQueueRowActions($actions, $post) {
        $actions['elementor'] = sprintf(
            '<a href="%1$s" class="" title="%2$s" aria-label="%2$s">%3$s</a>',
            rvy_admin_url("post.php?post=$post->ID&action=elementor"),
            esc_html__('Elementor', 'revisionary'),
            esc_html__('Elementor', 'revisionary')
        );

        return $actions;
    }

    // @todo: migrate to .js file with localize_script()
    function frontScripts() {
        if ($post_id = rvy_detect_post_id()) {
            if ($revision_status = rvy_in_revision_workflow($post_id)) {
                $can_publish = current_user_can('edit_post', rvy_post_id($post_id));
                
                switch ($revision_status) {
                    case 'draft-revision' :
                        if (current_user_can('set_revision_pending-revision', $post_id)) {
                            $label_caption = __('Submit', 'revisionary');
                        } else {
                            $label_caption = __('Update', 'revisionary');
                        }

                        break;

                    case 'pending-revision' :
                        if ($can_publish) {
                            $post = get_post($post_id);
                            $label_caption = ( strtotime( $post->post_date_gmt ) > agp_time_gmt() ) ? __('Approve', 'revisionary') : __('Publish', 'revisionary');
                        } else {
                            $label_caption = __('Update', 'revisionary');
                        }

                        break;

                    case 'future-revision' :
                        $label_caption = __('Update', 'revisionary');
                        break;

                    case 'default' :
                        $label_caption = __('Update', 'revisionary');
                        break;
                }
                ?>
            
                <script type="text/javascript">
                /* <![CDATA[ */
                var ppRevisionsPublishCaption = '<?php echo esc_html($label_caption);?>';

                <?php /* Label Publish button for next Revision workflow progression */ ?>
                var rvyIntLabelPublishButton = setInterval(function() {
                    var publishButtonLabel = document.getElementById("elementor-panel-saver-button-publish-label");

                    if (publishButtonLabel !== null) {
                        publishButtonLabel.innerHTML = ppRevisionsPublishCaption;

                        <?php /* Also enable submit / approval without changes */?>
                        var publishButton = document.getElementById("elementor-panel-saver-button-publish");

                        if (publishButton !== null) {
                            if (publishButton.classList.contains("elementor-button-success") && publishButton.classList.contains("elementor-disabled")) {
                                publishButton.classList.remove("elementor-disabled");
                            }
                        }
                    }
                }, 100);

                <?php /* Redirect to Revisions preview screen after revision status change */?>
                var rvyIntDetectStatusChange = setInterval(function() {
                        var elementorToast = document.getElementById("elementor-toast");
                        if (elementorToast !== null) {

                            var toastStyle = elementorToast.getAttribute("style");
                            if (toastStyle !== null) {
                                if (-1 == toastStyle.indexOf('display: none')) {
                                    clearInterval(rvyIntDetectStatusChange);

                                    setTimeout(function() {
                                        window.location = '<?php echo esc_url(add_query_arg('base_post', rvy_post_id($post_id), rvy_preview_url($post_id)));?>';
                                    }, 500);
                                }
                            }
                        }
                }, 500);

                /* ]]> */
                </script>
                <?php

                // Elementor disables the iframe links, so hide them
                if (!empty($_REQUEST['rvy_embed'])):?>
                    <style>
                    div.rvy_view_revision a.rvy_preview_linkspan {display: none;}
                    </style>
                <?php endif;
            }
        }
    }

    function elementorMonitorQueries() {
        add_filter('query', [$this, 'actAdjustElementorUpdateQuery']);
    }

    function actAdjustElementorUpdateQuery($qry) {
        global $revisionary, $wpdb, $current_user;

        if (0 === strpos($qry, 'UPDATE ') && strpos($qry, "`post_status` = '")) {
            if (!empty($_REQUEST['actions'])) {
                $actions = sanitize_text_field($_REQUEST['actions']);
                
                if (strpos($actions, '"action\":\"save_builder\"')
                && (strpos($actions, '"data\":{\"status\":\"publish\"') || strpos($actions, '"data\":{\"status\":\"future\"'))
                ) {
                    $post_id = (isset($_REQUEST['editor_post_id'])) ? (int) $_REQUEST['editor_post_id'] : 0;

                    if ($revision_status = rvy_in_revision_workflow($post_id)) {
                        switch($revision_status) {
                            case 'draft-revision':
                                $qry = str_replace("`post_mime_type` = 'draft-revision'", "`post_mime_type` = 'pending-revision'", $qry);
                                $qry = str_replace("`post_status` = 'draft'", "`post_mime_type` = 'pending'", $qry);
                                break;

                            case 'pending-revision':
                                $qry = str_replace("`post_status` = 'publish'", "`post_mime_type` = 'pending'", $qry); // don't allow the revision itself to be set published

                                $this->revision_id = $post_id;
                                add_action('elementor/document/after_save', [$this, 'actApprovePendingRevision'], 10, 2);
                                break;

                            case 'future-revision':
                                break;

                            default:
                        }
                    }
                }
            }
        }

        return $qry;
    }

    function actApprovePendingRevision($elem_doc, $data) {
        if (current_user_can('edit_post', rvy_post_id($this->revision_id))) {
            require_once(dirname(REVISIONARY_FILE) . '/admin/revision-action_rvy.php');	
            rvy_revision_approve($this->revision_id);
        }
    }

    function actPublishScheduledRevision($elem_doc, $data) {
        require_once( dirname(REVISIONARY_FILE).'/admin/revision-action_rvy.php');	
        rvy_revision_publish($this->revision_id);
    }

    // Stop Elementor from blocking front end display (even outside Elementor ) of past revisions to capable users
    function fltPostsRequestPastRevisions($request, $query_obj) {
        global $wpdb;
        static $busy;

        if (!empty($busy)) {
            return $request;
        }

        $busy = true;

        if (!is_admin() && (!defined('REST_REQUEST') || ! REST_REQUEST)) {
            $is_revision_query = strpos($request, "post_type = 'revision'");

            if (!$this->orig_post_id  && !empty($query_obj->query_vars['p'])) {
                if (('revision' == get_post_field('post_type', $query_obj->query_vars['p'])) && current_user_can('edit_post', $query_obj->query_vars['p'])) {
                    $this->orig_post_id = (int) $query_obj->query_vars['p'];
                }
            }

            if ($this->orig_post_id) {
                $this->orig_post_id = (int) $this->orig_post_id;
                $request = str_replace("ID = {$this->orig_post_id} AND $wpdb->posts.post_type IN ('post', 'page'", "ID = {$this->orig_post_id} AND $wpdb->posts.post_type IN ('post', 'page', 'revision'", $request);
            }
        }

        $busy = false;
        return $request;
    }

    // @todo: Is this hook still needed for scheduled revision submission?
    function elementorDisableSubmissionRedirect($redirect) {
        if (defined('DOING_AJAX') && DOING_AJAX && !empty($_REQUEST['action']) && ('elementor_ajax' == $_REQUEST['action']) && !empty($_REQUEST['editor_post_id']) && did_action('elementor/db/before_save')) {
            $redirect = false;
        }

        return $redirect;
    }
}
