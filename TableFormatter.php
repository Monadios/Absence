<?php
class TableFormatter implements I_Formatter
{
    public function format($data)
    {
        $output = '';
        $output .= '<table>';
        $output .= <<<DOC
<th> navn </th>
<th> opgjort </th>
<th> period  </th>
<th> year    </th>
DOC;
        foreach($data as $e){
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
}
?>