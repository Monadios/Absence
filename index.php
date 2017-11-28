<?php

require("simple_html_dom.php");
require("PageFetcher.php");
require("Parser.php");

$fetcher = new PageFetcher();
$parser  = new Parser();

$dom = $fetcher->fetch("Sebastian_Spaqaj_Gustav_LectioFravaer.html");

$table = $dom->find("table[id='s_m_Content_Content_fravaertbl']")[0]->find("tr");

$parsed = $parser->parse_student_data($table);

var_dump($parsed);


?>