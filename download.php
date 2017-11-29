<?php


session_start();

//Få relevant data fra SESSION eller returner til forrig side
if(isset($_SESSION["data"])){
    $content = $_SESSION["data"];
}else{
    $_SESSION["data_error"] = true;
    header("Location: index.php");
    exit;
}

if(isset($_SESSION["class"])){
    $class_name = $_SESSION["class"];
}else{
    $_SESSION["class_error"] = true;
    header("Location: index.php");
    exit;
}

if(isset($_SESSION["format"])){
    $format = $_SESSION["format"];
}else{
    $_SESSION["format_error"] = true;
    header("Location: index.php");
    exit;
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-disposition: attachment;filename=' . "$class_name.$format");
header('Content-Length: '.strlen($content));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
header('Pragma: public');

//Download indhold
echo( $content);
?>