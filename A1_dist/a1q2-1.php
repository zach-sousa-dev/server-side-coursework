<?php
/*
I Zachary Sousa, 000872268, certify that this
material is my original work. No other person's
work has been used without suitable acknowledgment
and I have not made my work available to anyone
else.
*/

/**
 * This PHP expects an integer passed through a POST request that is
 * greater than 0. Assuming the input is correct, it will respond back
 * with an HTML ordered list in a string containing all of the factors
 * of the integer. If the input is incorrect, it will handle the error
 * and respond with a helpful error message and code 400.
 * @author Zachary Sousa
 * @version 202535.00
 * @package COMP 10260 Assignment 1
 */

try {
    $result = getFactorsAsHTMLOrderedList(filter_input(INPUT_POST, "n", FILTER_VALIDATE_INT));
    http_response_code(200);
    echo $result;
} catch(InvalidArgumentException $e) {
    http_response_code(400);
    echo "Error ".http_response_code().": Ensure the input is an integer, is not empty, and is above 0.";
}

/**
 * Takes a natural number (not including zero) and finds all the factors
 * in order, and outputs it in an HTML ordered list.
 * 
 * @param integer $num      The number to factorize. Must be above 0.
 * @return  The HTML ordered list as a string containing the factors.
 */
function getFactorsAsHTMLOrderedList($num) {
    include "./get-factors.php";
    //  open the list
    $output = "<ol>";

    $arr = getFactors($num);
    foreach ($arr as $factor) {
        $output .= "<li>".$factor."</li>";
    }

    $output .= "</ol>";

    return $output;
}

?>
