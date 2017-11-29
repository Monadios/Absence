<?php

session_start();

if(!empty($_SESSION)){
    foreach($_SESSION as $key=>$e){
        if(preg_match("/.*error/", $key)){
            echo "<h1>Error</h1>$key : $e <br>";
        }
    }
    session_unset(); //der findes nok en bedre måde at gøre det på
}

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