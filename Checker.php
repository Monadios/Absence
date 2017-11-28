<?php
class Checker
{
    private $rules = [];


    public function __construct($rules=[])
    {
        $this->rules = $rules;
    }

    public function runCheck($data){
        $ret = [];
        foreach($this->rules as $rule){
            $filtered = array_filter($data,$rule);
            foreach($filtered as $e){
                if(!in_array($e, $ret,true)){
                    array_push($ret, $e);
                }
            }
        }

        return $ret;
    }

    public function addRule($rule)
    {
        array_push($rules, $rule);
    }
}
?>