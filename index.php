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

$parsed = $parser->parse_student_data($table);

$rule = function($student){
    return $student->get_opgjort()["percent"] > 5;
};

$analyzer = new Checker([$rule]);

$filtered = $analyzer->runCheck($parsed);

$formatter = $generator->createFormatter($filtered, FormatType::TABLE);

$formatted = $formatter->format();
$format = $formatter->get_format();

function parse_class_name($dom)
{
    $x = $dom->find("title")[0]->plaintext;
    $y = explode("-", $x);
    $class_name = preg_replace("/[\s-]+/", "_", trim($y[0]));
    return $class_name;
}


function parse_period($dom, $pos)
{
    $period = "s_m_Content_Content_PeriodChooserCtrl_start__date_tb";

    if($pos != "start" && $pos != "end"){
        return "";
    }else{
        //        $period = preg_replace("/PERIODTIME/",$pos,$generic_period);
        var_dump( $dom->find("input[id=$period"));
        return $period;
    }

    

    
}

echo parse_class_name($dom);
echo "s_m_Content_Content_PeriodChooserCtrl_start__date_tb" == parse_period($dom, "start");

echo $format;

echo $formatted;

echo '<form action="/download.php" method="post">';
echo "<input type='hidden' name='table_data' value='$formatted'/>";
echo "<input type='hidden' name='format' value='$format'/>";
echo "<input type='submit' value='Download Oversigt'/> ";
echo "</form>";

?>