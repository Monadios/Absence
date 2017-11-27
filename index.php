<?php

require("simple_html_dom.php");

$fetcher = new PageFetcher();

echo($fetcher->find("title"));

?>