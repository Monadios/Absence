<?php
class Parser
{
    public $student_data = NULL;
    private $labels_length = 3;
    
    public function parse_student_data($table)
    {
        //        $labels = parse_labels($table);
        $data = array_slice($table,3);
        $blah = [];
        foreach($data as $student){
            $student_data = $student->find("td");
            $name = $student_data[1]->plaintext;
            $period = [
                "modules" => $student_data[3]->plaintext,
                "percent" => $this->parse_percent($student_data[3]->plaintext)
            ];
                    
            $opgjort = [
                "modules" => $student_data[5]->plaintext,
                "percent" => $this->parse_percent($student_data[5]->plaintext)
            ];

            $year = [
                "modules" => $student_data[7]->plaintext,
                "percent" => $this->parse_percent($student_data[7]->plaintext)
            ];

            $new_student = new Student($name, $period, $opgjort, $year);
            array_push($blah, $new_student);
        }

        return $blah;
    }

    public function parse_labels($table)
    {
        $labels = array_slice($table,0,3);
    }

    private function parse_percent($modules)
    {
        $numbers = explode("/", $modules);
        return round(((int)$numbers[0]/(int)$numbers[1])*100,2);
    }
}
?>