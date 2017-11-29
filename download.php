<?php

if(isset($_POST["table_data"])){
    $content = $_POST["table_data"];
}else{
    header("Location: index.php");
   exit;
}

if(isset($_POST["format"])){
    $format = $_POST["format"];
}else{
    header("Location: index.php");
   exit;
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-disposition: attachment; filename=blah.json');
header('Content-Length: '.strlen($content));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
header('Pragma: public');

echo $content;
?>