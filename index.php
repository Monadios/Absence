<?php

require("simple_html_dom.php");
require("PageFetcher.php");
$fetcher = new PageFetcher();

$dom = $fetcher->fetch("Sebastian_Spaqaj_Gustav_LectioFravaer.html");
var_dump( $dom->find("table")[2]->id );

?>