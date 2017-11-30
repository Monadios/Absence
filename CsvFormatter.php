<?php

//Formaterer dataen i en JSON format

class CsvFormatter extends I_Formatter
{
    public function format()
    {
        $pretty = "";
        foreach($this->data as $e){
            $labels = [$e->get_name(),
                       "period_modules",
                       "period_percent",
                       "opgjort_modules",
                       "opgjort_percent",
                       "year_modules",
                       "year_percent"];

            $rest = [];

            foreach(array_values($e->absence) as $value){
                foreach(array_values($value) as $info){
                    array_push($rest, $info);
                }
            }


            $pretty .= implode(",",array_merge($labels,$rest)) . "\n";
        }

        return $pretty;
    }

    public function get_format()
    { 
        return "csv";
    }
}
?>