<?php

echo <<<DOC
<head>
 <link rel="stylesheet" type="text/css" href="change.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<script>
function load_new_content(){
     var selected_option_value=$("#format_select option:selected").val();
     $.post("overview.php", {format: selected_option_value},
         function(data){
         }
     );
} 
</script>
DOC;
session_start();

require("simple_html_dom.php");
require("PageFetcher.php");
require("Parser.php");
require("Checker.php");
require("Student.php");
require("FormatterGenerator.php");
require("I_Formatter.php");
require("TableFormatter.php");
require("JsonFormatter.php");
require("CsvFormatter.php");
require("DefaultFormatter.php");
require("Rule.php");
require("rules.php");

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

$rule = new AbsenceRule();



$analyzer = new Checker([$rule]);

$filtered = $analyzer->runCheck($parsed);

$formatter = $generator->createFormatter($filtered, 'table');

$formatted = $formatter->format();
$class_name = parse_class_name($dom);

echo "<h2>$class_name</h2>";

echo $formatted;

foreach(array_values($filtered[0]->absence) as $value){
    var_dump(array_values($value));
}

if(!empty($_POST)){
    $format = $_POST["format"];
    $formatter = $generator->createFormatter($filtered, $format);
    $_SESSION["data"] = $formatter->format();
    $_SESSION["class"] = $class_name;
    $_SESSION["format"] = $formatter->get_format();
    header("Location: download.php");
}


echo '<form action="/overview.php" method="post">';
echo "<input type='hidden' name='table_data' value='$formatted'/>";
echo "<input type='hidden' name='class' value='$class_name'/>";
echo "<input name='blah' id='submit_btn' type='submit' value='Download Oversigt'/> ";
echo <<<END
<h3>Vælg format</h3>
<select id=format_select name="format" onchange='load_new_content()'>
  <option value="table">html</option>
  <option value="json">json</option>
  <option value="txt">txt</option>
  <option value="csv">csv</option>
</select>
END;
echo "</form>";

?>
