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
require("Formatter.php");
require("TableFormatter.php");

$fetcher = new PageFetcher();
$parser  = new Parser();
$formatter  = new TableFormatter();

$dom = $fetcher->fetch("Sebastian_Spaqaj_Gustav_LectioFravaer.html");

$table = $dom->find("table[id='s_m_Content_Content_fravaertbl']")[0]->find("tr");

$parsed = $parser->parse_student_data($table);

$rule = function($student){
    return $student->get_opgjort()["percent"] > 15;
};

$analyzer = new Checker([$rule]);

$filtered = $analyzer->runCheck($parsed);

$formatted = $formatter->format($filtered);

echo $formatted;

$json = json_encode($filtered[0]);

echo '<form action="/download.php" method="post">';
echo    "<button submit='submit' name='table_data' value='$json'> Download Oversigt</button>";
echo "</form>";

?>