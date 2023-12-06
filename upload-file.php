<?php
require_once  'common/config/config.inc.php';
//require_once  'classes/class_common_bll.php';
$arrFileExtension = array('png', 'jpg', 'gif','zip','psd','PSD','PNG','JPG','JPEG','GIF','AI','ai','ZIP','RAR','rar','pdf','PDF','doc','DOC','docx','DOCX');
//code added by Amit --14-4-20 --start
$filecount = count($_FILES['file']['name']);
    $datastr = '';
    //echo '<pre>';print_r($_FILES);die;
    /*foreach($_FILES['file'] as $key=>$value){
        
        if($i<$filecount){
            $updated_name = time().'_'.$_FILES['file']['name'][$i];
            $datastr = $datastr . $updated_name.',';
            move_uploaded_file($_FILES['file']['tmp_name'][$i],UPLOADED_CONTACT_PATH . $updated_name);    
            $i = $i+1;
            continue;
        } else {
        break;
        }
        
        
        
    }*///this for multiple file upload

    foreach($_FILES['file'] as $key=>$value){
        
         //$updated_name = time().'_'.$_FILES['file']['name'];
        $file_name = $_FILES['file']['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $name_of_file = substr($file_name, 0, strrpos($file_name, '.'));
        $name_of_file = str_replace(' ', '-', $name_of_file);
        // Removes special chars.
        $name_of_file = preg_replace('/[^A-Za-z0-9\-]/', '', $name_of_file);
        $name_of_file = preg_replace('/-+/', '-', $name_of_file);
        $updated_name = time().'_'.$name_of_file.".".$ext;      
         if($value == 'name'){
          $datastr = $datastr . $updated_name.',';
        }
          move_uploaded_file($_FILES['file']['tmp_name'],UPLOADED_CONTACT_PATH . $updated_name);      
        
    }//this for simple file browse
    echo $datastr;
//code added by Amit --14-4-20 --ends





/*if(isset($_FILES)){    
      if($_POST['type']=='footer-form'){      
        $objCommonAction = new CommonAction();
        if($_GET['frm']=='contact'){
            $arrStatus = $objCommonAction->uploadedFile($_FILES,FILE_UPLOADED_PATH,'upl',$arrFileExtension);
        }else{
        $arrStatus = $objCommonAction->uploadedFile($_FILES,FILE_UPLOADED_PATH,'upl',$arrFileExtension);
        }
        if($arrStatus['status']=='success'){   
            echo json_encode(array('status'=>'success','fileName'=>$arrStatus['fileName']));
            exit;
        }else{
            echo json_encode(array('status'=>'error1'));
            exit;
        }          
      } 
         echo json_encode(array('status'=>'error2'));
         exit;
    }*/
?>