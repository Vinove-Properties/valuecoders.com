<?php
if(isset($_POST['act']) && $_POST['act']=='del')
{
    $delFile = $_POST['delFile'];
    /*if (file_exists($value)) {
        unlink($value);
    } else {
        // code when file not found$output_dir = "common/uploaded_files/request_a_quote/";
    }*/
    //echo $delFile;die;
    
    if(file_exists("common/uploaded_files/request_a_quote/" . $delFile))
    {
       unlink("common/uploaded_files/request_a_quote/" .$delFile); 
       die(json_encode(array('msg'=>'1','filename'=>'delete successfully1'))); 
    }
    else
    {
        die(json_encode(array('msg'=>'2','filename'=>'not delete successfully'))); 
    }
   
}

if(isset($_FILES["ffile"]["type"]))
{
 //   echo "good12121";die;
    //echo "good";
    //$validextensions = array("jpeg", "jpg","JPG", "png");
    $time = time();
    $temporary = explode(".", $_FILES["ffile"]["name"]);
    $file_extension = end($temporary);
    $file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $_FILES["ffile"]["name"]);
    $varFileName=$time.'-'.$file_name;
    $validextensions = array("jpeg","JPEG", "jpg","JPG", "png", "PNG", "gif", "GIF", "psd", "PSD", "ai", "AI", "zip", "ZIP", "rar", "RAR", "pdf", "PDF", "doc", "DOC", "docx", "DOCX", "xls", "XLS", "xlsx", "XLSX", "ppt", "PPT");
    /*$temporary = explode(".", $_FILES["ffile"]["name"]);
    $file_extension = end($temporary);*/
    //if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
    if (($_FILES["ffile"]["size"] <= 26068672)//Approx. 22mb files can be uploaded.
    && in_array($file_extension, $validextensions)) {
        if ($_FILES["ffile"]["error"] > 0)
        {
            die(json_encode(array('msg'=>'0','filename'=>$_FILES['ffile']['error'])));
            //echo "Return Code: " . $_FILES["ffile"]["error"] . "<br/>";
        }
        else if (file_exists("common/uploaded_files/request_a_quote/" . $varFileName))
        {
            //echo $_FILES["ffile"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            /*$sourcePath = $_FILES['ffile']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
            @move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
            echo "<span style='color:green;' id='success'>File Uploaded Successfully...!!</span><span></span>";*/
            die(json_encode(array('msg'=>'1','filename'=>$varFileName)));
        }
        else
        {
            /*$sourcePath = $_FILES['ffile']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "upload/".$_FILES['ffile']['name']; // Target path where file is to be stored
            @move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
            //createThumbnail($_FILES["ffile"]["name"]);
            echo "<span style='color:green;' id='success'>File Uploaded Successfully...!!</span><span></span>";*/
            $sourcePath = $_FILES['ffile']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = "common/uploaded_files/request_a_quote/".$varFileName; // Target path where file is to be stored
           //echo $targetPath;die;
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
?>
