<?php
class JsonFormatter implements Formatter
{
    public function format($data)
    {
        return json_encode($data);
    }
}
?>