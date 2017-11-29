<?php
abstract class I_Formatter
{
    protected $data;
    
    public function __construct($data){
        $this->data = $data;
    }
    
    abstract public function format();
    abstract public function get_format();
}
?>