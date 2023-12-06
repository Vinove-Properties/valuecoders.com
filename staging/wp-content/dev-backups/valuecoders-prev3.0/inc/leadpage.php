<?php 
if( isset( $_SERVER['HTTP_HOST'] ) && ($_SERVER['HTTP_HOST'] == "localhost") ){
    $spdb = new wpdb('phpmyadmin','root','vinove-blog', 'localhost');
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
    $detail = $spdb->get_row( $spdb->prepare( "SELECT * FROM wp_webleads WHERE id = %d", $_GET['udetail'] ) );
    if( $detail ){
        /*
        echo '<pre>';
        print_r($detail);
        echo '</pre>';
        */
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
        $postedat = date('F d, Y @ h:i:s A',strtotime($detail->created_at));
        echo "<div class='wrap vcl-details'>";
        echo '<div class="row"><label>Name : </label><div class="udetails">'.$detail->name.'</div></div>';
        echo '<div class="row"><label>Email : </label><div class="udetails">'.$detail->email.'</div></div>';
        echo '<div class="row"><label>Phone : </label><div class="udetails">'.$detail->phone.'</div></div>';
        echo '<div class="row"><label>Country : </label><div class="udetails">'.$detail->country.'</div></div>';        
        echo '<div class="row"><label>IP : </label><div class="udetails">'.$detail->IP.'</div></div>';
        echo '<div class="row"><label>Source : </label><div class="udetails">'.$detail->source.'</div></div>';
        echo '<div class="row"><label>Document : </label><div class="udetails">'.$attachment.'</div></div>';
        echo '<div class="row"><label>Date : </label><div class="udetails">'.$postedat.'</div></div>';
        echo '<div class="row"><label>Requirement : </label><div class="udetails">'.$detail->message.'</div></div>';
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
    $mQuery = "SELECT COUNT(*) FROM wp_webleads WHERE email = '".$_GET['uemail']."'";
    $data = $spdb->get_results( "SELECT * FROM wp_webleads WHERE email = '".$_GET['uemail']."' ORDER BY created_at DESC LIMIT ${offset}, ${items_per_page}" );    
    }else{
    $mQuery = "SELECT COUNT(*) FROM wp_webleads";    

    $data = $spdb->get_results( "SELECT * FROM wp_webleads ORDER BY created_at DESC LIMIT ${offset}, ${items_per_page}" );
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
foreach($data as $leaddata){
?>	
<tr>
<td><a href="<?php echo admin_url('admin.php?page=vc-leads&udetail='.$leaddata->id); ?>"><?=$leaddata->name?></a></td>
<td><a href="<?php echo admin_url('admin.php?page=vc-leads&uemail='.$leaddata->email); ?>"><?=$leaddata->email?></a></td>
<td><?=$leaddata->phone?></td>
<td><?=$leaddata->country?></td>
<td><?= wp_trim_words( $leaddata->message, 15, '...' );?></td>
<td><?=$leaddata->IP?></td>
<td><?=$leaddata->source?></td>
<td><?=$leaddata->created_at?></td>
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