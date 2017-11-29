<?php

echo <<<DOC
<head>
 <link rel="stylesheet" type="text/css" href="change.css"/>
</head>

DOC;

require("simple_html_dom.php");
require("PageFetcher.php");
require("Parser.php");
require("Checker.php");
require("Student.php");
require("FormatterGenerator.php");
require("FormatType.php");
require("I_Formatter.php");
require("TableFormatter.php");
require("JsonFormatter.php");
require("DefaultFormatter.php");

$fetcher = new PageFetcher();
$parser  = new Parser();
$generator  = new FormatterGenerator();

$dom = $fetcher->fetch("Sebastian_Spaqaj_Gustav_LectioFravaer.html");

$table = $dom->find("table[id='s_m_Content_Content_fravaertbl']")[0]->find("tr");

function parse_class_name($dom)
{
    $x = $dom->find("title")[0]->plaintext;
    $y = explode("-", $x);
    $class_name = preg_replace("/[^a-zA-Z0-9]+/", "_", trim($y[0]));
    return $class_name;
}

$parsed = $parser->parse_student_data($table);

$rule = function($student){
    if(isset($_GET["percent"])){
        $thresh = $_GET["percent"];
    }else{
        $thresh = 8;
    }
    return  $student->get_opgjort()["percent"] > $thresh;
};

$analyzer = new Checker([$rule]);

$filtered = $analyzer->runCheck($parsed);

$formatter = $generator->createFormatter($filtered, 'table');

$formatted = $formatter->format();
$format = $formatter->get_format();
$class_name = parse_class_name($dom);

echo "<h2>$class_name</h2>";

echo $formatted;

echo '<form action="/download.php" method="post">';
echo "<input type='hidden' name='table_data' value='$formatted'/>";
echo "<input type='hidden' name='format' value='$format'/>";
echo "<input type='hidden' name='class' value='$class_name'/>";
echo "<input id='submit_btn' type='submit' value='Download Oversigt'/> ";
echo "</form>";

?>