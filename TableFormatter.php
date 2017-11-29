<?php

//Formaterer dataen som en HTML tabel

class TableFormatter extends I_Formatter
{
    public function format()
    {
        $output = '';
        $output .= '<table>';
        $output .= <<<DOC
<th> navn </th>
<th> opgjort moduler </th>
<th> opgjort procent </th>
<th> period  moduler </th>
<th> period  procent </th>
<th> year moduler  </th>
<th> year procent    </th>
DOC;
        foreach($this->data as $e){
            $output .= '
    <tr>
     <td>' . $e->get_name() . '</td>
     <td>' . $e->get_opgjort()["modules"] . '</td>
     <td>' . $e->get_opgjort()["percent"] . "%" . '</td>
     <td>' . $e->get_period()["modules"] . '</td>
     <td>' . $e->get_period()["percent"] . "%" . '</td>
     <td>' . $e->get_yearly()["modules"] . '</td>
     <td>' . $e->get_yearly()["percent"] . "%" . '</td>
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