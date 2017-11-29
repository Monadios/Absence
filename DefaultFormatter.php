<?php

//Returnerer tekst i uformatteret tilstand
class DefaultFormatter extends I_Formatter
{
    public function format()
    {
        return var_export($this->data, true);
    }

    public function get_format()
    {
        return "txt";
    }
}
?>