<?php
class Formatter
{
    public function format($data, $type)
    {
        switch($type)
        {
        case FormatType::JSON:
            echo "json";
            return new JsonFormatter($data);
            break;

        case FormatType::TABLE:
            echo "table";
            return new TableFormatter($data);
            break;
            
        case FormatType::PLAIN:
            echo "plain";
            return new DefaultFormatter($data);
            break;
            
        default:
            echo "default";
            return new DefaultFormatter($data);
            break;
        }
    }
}
?>