<?php

/*
  Repræsenterer en elev
*/

class Student
{
    public $student_name = NULL;
    public $absence = [
        "period" => [
            "modules" => NULL,
            "percent" => NULL,
        ],

        "opgjort" => [
            "modules" => NULL,
            "percent" => NULL
        ],

        "year" => [
            "modules" => NULL,
            "percent" => NULL
        ]
    ];

    public function __construct($name, $period, $opgjort, $year)
    {
        $this->student_name = $name;
        $this->absence["period"] = $period;
        $this->absence["opgjort"] = $opgjort;
        $this->absence["year"] = $year;
    }

    public function get_name()
    {
        return $this->student_name;
    }

    public function get_period()
    {
        return $this->absence["period"];
    }

    public function get_opgjort()
    {
        return $this->absence["opgjort"];
    }

    public function get_yearly()
    {
        return $this->absence["year"];
    }

    
        

}
?>