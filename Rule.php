<?php

/*
  Denne klasse bruges til at bygge de regler som 
  bruges til at filtrere data
*/

abstract class Rule
{
    public function __construct(){}
    
    public function check($student)
    {
        if(!is_a($student, "Student")){
            return false;
        }else{
            return $this->doCheck($student);
        }
    }
    
    protected abstract function doCheck($student);
}
?>