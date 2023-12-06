<?php 
if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
    $spdb = new wpdb('phpmyadmin','root','valuecoders-wp', 'localhost');
}else{
    $spdb = new wpdb('valuecoc_wpsite','W@89Uz*3J!gp6>dA','valuecoc_vclive0606', 'localhost');
}
if( isset( $_GET['udetail'] ) && !empty( $_GET['udetail'] ) ){ ?>
<style type="text/css">
.vcl-details label{display: inline-block; width: 15%; vertical-align: top; font-weight: 500;}
.vcl-details .row{display: block; margin-bottom: 5px; border: 1px solid #cccccc; padding: 12px;}
.vcl-details .row a{text-decoration: none;}
.vcl-details .row a:hover{text-decoration:underline;}
.vcl-details .udetails {display: inline-block; width: 85%;}    
</style>    
<?php
    $detail = $spdb->get_row( $spdb->prepare( "SELECT * FROM spam_leads WHERE id = %d", $_GET['udetail'] ) );
    if( $detail ){
        $data = preg_replace_callback('!s:\d+:"(.*?)";!s', 
        function($m) {
        return "s:" . strlen($m[1]) . ':"'.$m[1].'";'; 
        }, $detail->data);

        $data = unserialize( $data );        
        /*
        $hasDoc = false;
        if( $detail->attachments != "Not Uploaded" ){
            $atch = explode(" ", $detail->attachments); 
            foreach( $atch as $row ){
                if( !empty( $row ) ){
                    $extension = pathinfo($row, PATHINFO_EXTENSION);
                    $filename  = pathinfo($row, PATHINFO_FILENAME);
                    $hasDoc .= '<a href="'.$row.'" target="_blank">'.$filename.'.'.$extension.'</a><br>';
                }
            }
        }
        $attachment = ( $hasDoc !== false ) ? $hasDoc : $detail->attachments;
        */
        $postedat = date('F d, Y @ h:i:s A',strtotime($detail->created_at));
        echo "<div class='wrap vcl-details'>";
        
        echo '<div class="row"><label>Name : </label><div class="udetails">';
        echo (isset($data['user-name'])) ? $data['user-name'] : 'N/A';
        echo '</div></div>';

        echo '<div class="row"><label>Email : </label><div class="udetails">';
        echo (isset($data['user-email'])) ? $data['user-email'] : 'N/A';
        echo '</div></div>';

        echo '<div class="row"><label>Phone : </label><div class="udetails">';
        echo (isset($data['user-phone'])) ? $data['user-phone'] : 'N/A';
        echo '</div></div>';

        echo '<div class="row"><label>Country : </label><div class="udetails">';
        echo (isset($data['user-country'])) ? $data['user-country'] : 'N/A';
        echo '</div></div>';

        echo '<div class="row"><label>IP Address : </label><div class="udetails">';
        echo (isset($data['ip_addr'])) ? $data['ip_addr'] : 'N/A';
        echo '</div></div>';

        echo '<div class="row"><label>Source : </label><div class="udetails">';
        echo (isset($data['page_url'])) ? $data['page_url'] : 'N/A';
        echo '</div></div>';

        echo '<div class="row"><label>Date : </label><div class="udetails">'.$postedat.'</div></div>';

        echo '<div class="row"><label>Requirement : </label><div class="udetails">';
        echo (isset($data['user-req'])) ? nl2br(esc_html($data['user-req'])) : 'N/A';
        echo '</div></div>';

        
        echo "</div>";
    }else{
        die("Invalid ID.");
    }
}else{
?>
<style type="text/css">
.vc-pagination ul {text-align: center; margin-top: 25px;}    
.vc-pagination ul li{display: inline-block; margin: 0 3px; }
.vc-pagination ul li a{text-decoration: none; padding: 5px 10px; background: #000000; color: #ffffff;}
div.rcount{display: block; padding: 10px; text-align: center; font-size: 20px; background: green; color: #ffffff;
margin-bottom: 10px; border: 5px solid #cccccc; text-transform: initial;}
</style>
<?php
    $items_per_page = 50;
    $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
    $offset = ( $page * $items_per_page ) - $items_per_page;

    if( isset( $_GET['uemail'] ) && !empty( $_GET['uemail'] ) ){
    $mQuery = "SELECT COUNT(*) FROM spam_leads WHERE email = '".$_GET['uemail']."'";
    $data = $spdb->get_results( "SELECT * FROM spam_leads WHERE email = '".$_GET['uemail']."' ORDER BY created_at DESC LIMIT ${offset}, ${items_per_page}" );    
    }else{
        $mQuery = "SELECT COUNT(*) FROM spam_leads";
        $data   = $spdb->get_results( "SELECT * FROM spam_leads ORDER BY created_at DESC LIMIT ${offset}, ${items_per_page}" );
    }
    
    $total = $spdb->get_var( $mQuery );
    echo '<div class="rcount">Total Count : '.$total.'</div>';
?>
 
<table class="wp-list-table widefat fixed striped table-view-list pages">
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Country</th>
<th>Message</th>
<th>IP</th>
<th>Source</th>
<th>Creation Date</th>
</tr>
<?php
foreach( $data as $leaddata ){
$data = preg_replace_callback('!s:\d+:"(.*?)";!s', 
    function($m) {
        return "s:" . strlen($m[1]) . ':"'.$m[1].'";'; 
    }, $leaddata->data);

$data = unserialize( $data );
//print_r( $data );
?>	
<tr>
    <td>
    <a href="<?php echo admin_url('admin.php?page=vc-spam-leads&udetail='.$leaddata->ID); ?>">
        <?php echo (isset( $data['user-name'] ) ) ? $data['user-name'] : "N/A"; ?>
    </a>
    </td>
    <td><?php echo (isset( $data['user-email'] ) ) ? $data['user-email'] : "N/A"; ?></td>
    <td><?php echo (isset( $data['user-email'] ) ) ? $data['user-phone'] : "N/A"; ?></td>
    <td><?php echo (isset( $data['user-country'] ) ) ? $data['user-country'] : "N/A"; ?></td>
    <td><?php echo (isset( $data['user-req'] ) ) ? wp_trim_words($data['user-req'], 15, '...') : "N/A"; ?></td>
    <td><?php echo (isset( $data['ip_addr'] ) ) ? $data['ip_addr'] : "N/A"; ?></td>
    <td><?php echo (isset( $data['page_url'] ) ) ? $data['page_url'] : "N/A"; ?></td>
    <td><?php echo $leaddata->created_at; ?></td>
</tr>

	<?php
}
?>
</table>
<?php 
echo '<div class="vc-pagination">';
echo paginate_links( array(
'base' => add_query_arg( 'cpage', '%#%' ),
'format' => '',
'prev_text' => __('&laquo;'),
'next_text' => __('&raquo;'),
'total' => ceil($total / $items_per_page),
'current' => $page,
'type' => 'list'
));
echo '</div>';
?>

<?php } ?>