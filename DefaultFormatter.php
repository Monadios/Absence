<?php
class DefaultFormatter extends I_Formatter
{
    public function format()
    {
        return $this->data;
    }

    public function get_format()
    {
        return "txt";
    }
}
?>