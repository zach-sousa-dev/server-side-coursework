<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $req = json_decode(file_get_contents('php://input'), true);
        $data = [
            "result" => factorialize($req["number"])
        ];
        echo json_encode($data);
    }


    // returns 0 if impossible
    function factorialize($number) {
        $result = 1;

        if($number < 0 || !isset($number)) {
            return 0;
        }

        // refactor to be recursive or smth idk this sucks but im too lazy to fix it
        for($i = 1; $i <= $number; $i++) {
            $result = $result * $i;
        }
        return $result;
    }
?>