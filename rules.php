<?php
class AbsenceRule extends Rule
{
    protected function doCheck($student)
    {
        if(isset($_GET["percent"])){
            $thresh = $_GET["percent"];
        }else{
            $thresh = 8;
        }
        return  $student->get_opgjort()["percent"] > $thresh;        
    }
}
?>