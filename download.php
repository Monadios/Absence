<?php


//Få relevant data fra POST request eller returner til forrig side
if(isset($_POST["table_data"])){
    $content = $_POST["table_data"];
}else{
    header("Location: index.php");
   exit;
}

if(isset($_POST["class"])){
    $class_name = $_POST["class"];
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

$generator = new FormatterGenerator();
$formatter = $generator->createFormatter($filtered, FormatType::TABLE);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-disposition: attachment;filename=' . "$class_name.$format");
header('Content-Length: '.strlen($content));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
header('Pragma: public');

//Download indhold
echo $content;
?>