<?php
class RevisionaryProSettingsUI {
    function __construct() {
        add_action('revisionary_settings_ui', [$this, 'actSettingsUI']);
        add_action('revisionary_option_ui_pending_revisions', [$this, 'actPendingRevisionsUI']);
        add_action('revisionary_option_ui_revision_options', [$this, 'actRevisionOptionsUI']);
        add_filter('revisionary_option_captions', [$this, 'fltOptionCaptions']);
        add_filter('revisionary_option_sections', [$this, 'fltOptionSections']);
    }

    function actSettingsUI($ui) {
        $ui->option_captions['display_pp_branding'] = esc_html__('Display PublishPress Branding in Admin', 'revisionary');

        $ui->section_captions = ['license' => esc_html__('License Key', 'revisionary'), 'branding' => esc_html__('Branding', 'revisionary')] + $ui->section_captions;

        $ui->form_options['features']['branding'] = ['display_pp_branding'];
    }

    function fltOptionCaptions($captions) {
        $captions['pending_revision_unpublished'] = (rvy_get_option('revision_statuses_noun_labels')) ? esc_html__('Change Requests for Unpublished Posts', 'revisionary') :  esc_html__('Revision Submission for Unpublished Posts', 'revisionary');

        if (class_exists('ACF')) {
            $captions['prevent_rest_revisions'] = esc_html__('Prevent Redundant Revisions', 'revisionary');
        }

        return $captions;
    }

    function fltOptionSections($sections) {
        $sections['features']['pending_revisions'][] = 'pending_revision_unpublished';

        if (class_exists('ACF')) {
            $sections['features']['revisions'][] = 'prevent_rest_revisions';
        }

        return $sections;
    }

    function actPendingRevisionsUI($settings_ui) {
        $hint = '';
		$settings_ui->option_checkbox('pending_revision_unpublished', 'features', 'pending_revisions', $hint, '');
    }

    function actRevisionOptionsUI($settings_ui) {
        if (class_exists('ACF')) {
            $hint = esc_html__( 'Prevent REST requests from generating revisions (which may be stored without ACF fields)', 'revisionary' );
            $settings_ui->option_checkbox('prevent_rest_revisions', 'features', 'revisions', $hint, '');
        }
    }
}