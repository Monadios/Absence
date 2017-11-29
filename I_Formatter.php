<?php

/*
  Denne klasse nedarves og udfyldes af andre Formatter klasser
*/

abstract class I_Formatter
{
    protected $data;
    
    public function __construct($data){
        $this->data = $data;
    }

    //står for at formaterer dataen
    abstract public function format();

    //står for at returnerer hvilken filtype som dataen bør have
    abstract public function get_format();
}
?>