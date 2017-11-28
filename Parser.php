<?php
class Parser
{
    private $student_data = NULL;
    private $labels_length = 3;
    
    public function parse_student_data($table)
    {
        //        $labels = parse_labels($table);
        $data = array_slice($table,3);

        foreach($data as $student){
            $student_data = $student->find("td");
            $name = $student_data[1]->plaintext;
            $this->student_data[$name]=[
                "period" => [
                    "percent" => $student_data[2]->plaintext,
                    "modules" => $student_data[3]->plaintext
                ],

                "opgjort" => [
                    "percent" => $student_data[4]->plaintext,
                    "modules" => $student_data[5]->plaintext
                ],

                "year" => [
                    "percent" => $student_data[6]->plaintext,
                    "modules" => $student_data[7]->plaintext
                ]
            ];
            
        }

        return $this->student_data;
    }

    public function parse_labels($table)
    {
        $labels = array_slice($table,0,3);
    }
}
?>