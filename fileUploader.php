<!-- // print_r($_FILES);

// $name = $_FILES['fileUploader']['name'];
// $temp = $_FILES['fileUploader']['tmp_name'];


// $dir = "upload/";

// move_uploaded_file($temp, $dir . $name);


// header("Location:gallery.php"); -->




<?php
$file_name =  $_FILES['fileUploader']['name'];
$tmp_name = $_FILES['fileUploader']['tmp_name'];
$file_up_name = time() . $file_name;

//   $dir = "upload/";
// move_uploaded_file($tmp_name, "/upload/" . $file_up_name);


$dir = "upload/";

move_uploaded_file($tmp_name, $dir . $file_name);

header("Location:index.php");

?>