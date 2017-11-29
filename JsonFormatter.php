<?php

//Formaterer dataen i en JSON format

class JsonFormatter extends I_Formatter
{
    public function format()
    {
        $pretty = [];
        foreach($this->data as $e){
            $pretty[$e->get_name()] = $e->absence;
        }

        return json_encode($pretty, JSON_PRETTY_PRINT);
    }

    public function get_format()
    {
        return "json";
    }
}
?>