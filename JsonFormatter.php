<?php
class JsonFormatter implements I_Formatter
{
    public function format($data)
    {
        return json_encode($data);
    }
}
?>