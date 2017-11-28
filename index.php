<?php

require("simple_html_dom.php");
require("PageFetcher.php");
require("Parser.php");
require("Checker.php");
require("Student.php");
$fetcher = new PageFetcher();
$parser  = new Parser();
$formatter  = new Parser();

$dom = $fetcher->fetch("Sebastian_Spaqaj_Gustav_LectioFravaer.html");

$table = $dom->find("table[id='s_m_Content_Content_fravaertbl']")[0]->find("tr");

$parsed = $parser->parse_student_data($table);

$rule = function($student){
    return $student->get_opgjort() > 10;
};

$analyzer = new Checker([$rule]);

$filtered = $analyzer->runCheck($parsed);

echo '<table>';
foreach($filtered as $e){
    echo '
    <tr>
     <td>' . $e->get_opgjort()["percent"] . '<br> </td>
    </tr>';
    echo "</table>";
}

echo <<<END
<form action="/download.php" method="get">
  <button submit="button" value="Reset">Reset</button>
</form>
END;

?>