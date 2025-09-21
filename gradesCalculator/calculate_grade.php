<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $req = json_decode(file_get_contents('php://input'), true);
        $data = [
            "result" => calculateGrade($req["number"])
        ];
        echo json_encode($data);
    }

    /**
     * Takes in a numeric grade and returns a letter grade
     * where:
     * 90+    -> A
     * 80-89 -> B
     * 70-79 -> C
     * 60-69 -> D
     * < 60  -> F
     * 
     * @param number    numeric grade (ex. 60 representing 60% marks)
     * @return grade    the corresponding letter grade
     */
    function calculateGrade($number) {
        if($number < 0 || !isset($number)) {
            return "Invalid grade.";
        }

        if($number >= 90) {
            return "A";
        }

        if($number >= 80) {
            return "B";
        }

        if($number >= 70) {
            return "C";
        }

        if($number >= 60) {
            return "D";
        }

        return "F";
    }
?>