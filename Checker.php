<?php
/*
  Denne klasse opererer ud fra et sæt regler disse regler er
  repræsenteret som funktioner der tager imod en Student objekt
  og returnerer sandt eller falsk baseret på om dens kriterer 
  er mødt eller ej
*/

class Checker
{
    private $rules = [];


    public function __construct($rules=[])
    {
        $this->rules = $rules;
    }

    //kør igennem reglerne og filtrer relevant data
    public function runCheck($data){
        $ret = [];
        foreach($this->rules as $rule){
            $filtered = array_filter($data,function($s) use ($rule) {
                return $rule->check($s);
            });

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

    public function getRules()
    {
        return $this->rules;
    }
}
?>