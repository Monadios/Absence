<?php


class Parser
{
    public $student_data = NULL;
    private $labels_length = 3;

    //retunerer en Student objekt
    public function parse_student_data($table)
    {
        $data = array_slice($table,3);
        $students = [];
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
            array_push($students, $new_student);
        }

        return $students;
    }

    //I stedet for at skulle bruge HTML scraping til at få fraværsprocenter,
    //kan vi udregne dem fra modulerne
    private function parse_percent($modules)
    {
        $numbers = explode("/", $modules);
        return round(((int)$numbers[0]/(int)$numbers[1])*100,2);
    }
}
?>