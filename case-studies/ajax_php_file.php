<?php
if(isset($_POST['act']) && $_POST['act']=='del')
{
    $delFile = $_POST['delFile'];
    /*if (file_exists($value)) {
        unlink($value);
    } else {
        // code when file not found
    }*/
    if(file_exists("upload/" . $delFile))
    {
       unlink("upload/" .$delFile); 
       die(json_encode(array('msg'=>'1','filename'=>'delete successfully1'))); 
    }
    else
    {
        die(json_encode(array('msg'=>'2','filename'=>'not delete successfully'))); 
    }
   
}
if(isset($_FILES["file"]["type"]))
{
    $time = time();
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    $varFileName=$time.'-'.$_FILES["file"]["name"];
    //$validextensions = array("jpeg", "jpg","JPG", "png");
    $validextensions = array("jpeg","JPEG", "jpg","JPG", "png", "PNG", "gif", "GIF", "psd", "PSD", "ai", "AI", "zip", "ZIP", "rar", "RAR", "pdf", "PDF", "doc", "DOC", "docx", "DOCX", "xls", "XLS", "xlsx", "XLSX", "ppt", "PPT");
    
    //if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
    if (($_FILES["file"]["size"] <= 26068672) && in_array($file_extension, $validextensions)) { //echo "file size=> ".$_FILES["file"]["size"];
        //die(json_encode(array('msg'=>'4','filename'=>$_FILES["file"]["type"]))); exit;
        if ($_FILES["file"]["error"] > 0)
        {
            die(json_encode(array('msg'=>'0','filename'=>$_FILES['file']['error'])));
            //echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
        }
        
        else if (file_exists("upload/" . $varFileName))
        {
            //echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            /*$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
            @move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file*/
            //echo "<span style='color:red;' id='success'>File already exists...!!</span><span></span>";
            die(json_encode(array('msg'=>'1','filename'=>$varFileName)));
        }
        else
        {
            /*$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored*/
            $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/".$varFileName; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
            //createThumbnail($_FILES["file"]["name"]);
            //echo "<span style='color:green;' id='success'>File Uploaded Successfully...!!</span><span></span>";
            die(json_encode(array('msg'=>'1','filename'=>$varFileName)));
        }
    }
    else
    {
        //echo "<span style='color:red;' id='invalid'>Invalid file Size or Type<span>";
        die(json_encode(array('msg'=>'3','filename'=>$varFileName)));
    }
}

/*$time = time();
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $varFileName=$time . '.'.$ext;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/'.SITE_NAME.'/uploaded_files/' . $time . '.'.$ext;
        //echo $_FILES["file"]["tmp_name"] . '--' . $target_path;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {

        } else {

        }*/
?>