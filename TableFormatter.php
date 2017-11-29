<?php
class TableFormatter extends I_Formatter
{
    public function format()
    {
        $output = '';
        $output .= '<table>';
        $output .= <<<DOC
<th> navn </th>
<th> opgjort </th>
<th> period  </th>
<th> year    </th>
DOC;
        foreach($this->data as $e){
            $output .= '
    <tr>
     <td>' . $e->get_name() . '</td>
     <td>' . $e->get_opgjort()["modules"] . '</td>
     <td>' . $e->get_period()["modules"] . '</td>
     <td>' . $e->get_yearly()["modules"] . '</td>
    </tr>';
            
        }
        $output .= "</table>";

        return $output;
    }


    public function get_format()
    {
        return "html";
    }
}
?>