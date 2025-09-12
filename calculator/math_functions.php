<?php
    // Function for addition
    function add($num1, $num2) {
        return $num1 + $num2;
    }

    // Function for subtraction
    function subtract($num1, $num2) {
        return $num1 - $num2;
    }

    // Function for multiplication
    function multiply($num1, $num2) {
        return $num1 * $num2;
    }

    // Function for division
    function divide($num1, $num2) {
        if ($num2 != 0) {
            return $num1 / $num2;
        } else {
            return NAN;
        }
    }
?>