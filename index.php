<?php

echo <<<END
<head>
 <link rel="stylesheet" type="text/css" href="change.css"/>
</head>

<h2> Vælg Fraværprocent </h2>
END;

echo '<form action="/overview.php" method="get">';
echo "<input id=absence_field type='number' name='percent' placeholder='fraværprocent'/>";
echo "<input id='submit_btn' type='submit' value='Tjek fravær'/> ";
echo "</form>";


?>