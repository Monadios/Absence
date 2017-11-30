<?php

/*
  Bruges til at lave instanser af diverse Formatter klasser
*/

class FormatterGenerator
{
    //Returnerer et Formatter objekt
    public function createFormatter($data, $type, $verbose=false)
    {
        //Tjek at al dataen er instanser af Student klassen
        foreach($data as $e){
            if(!is_a($e, "Student")){
                trigger_error("Badly Formatted Input Data");
                return;
            }
        }

        
        //En DefaultFormatter outputter det samme som den får som input
        //Så hvis man ikke vælger en bestemt type (eller hvis typen ikke kan findes)
        //får man som output bare uformateret data
        $formatter = new DefaultFormatter($data);
        $verbose_type_output = "";
        //Vælg passende formatteringsklasse ud fra den efterspurgte formattypen
        switch($type)
        {
        case 'json':
            $verbose_type_output = "json";
            $formatter = new JsonFormatter($data);
            break;

        case 'table':
            $verbose_type_output = "table";
            $formatter = new TableFormatter($data);
            break;
            
        case 'csv':
            $verbose_type_output = "csv";
            $formatter = new CsvFormatter($data);
            break;

        case 'plain':
            $verbose_type_output = "plain";
            $formatter = new DefaultFormatter($data);
            break;
            
        default:
            $verbose_type_output = "default";
            break;
        }


        if($verbose){
            echo $verbose_type_output;
        }

        return $formatter;
    }
}
?>