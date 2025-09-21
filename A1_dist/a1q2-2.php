<?php
/*
I Zachary Sousa, 000872268, certify that this
material is my original work. No other person's
work has been used without suitable acknowledgment
and I have not made my work available to anyone
else.
*/

/**
 * This PHP expects 2 integers passed through a POST request that are
 * greater than 0 and less than 100. Assuming the input is correct, it 
 * will respond back with an HTML unordered list in a string containing 
 * all of the numbers between the 2 integers that do not contain any 
 * factors that are part of the 2 integers (excluding 1). If the input 
 * is incorrect, it will handle the error and respond with a helpful 
 * error message and code 400.
 * @author Zachary Sousa
 * @version 202535.00
 * @package COMP 10260 Assignment 1
 */

try {
    if(filter_input(INPUT_POST, "start", FILTER_VALIDATE_INT) > 100 || filter_input(INPUT_POST, "end", FILTER_VALIDATE_INT) > 100) {
        http_response_code(400);
        echo "Error ".http_response_code().": The inputs must be below 100.";
    }
    $result = getErdosWoodsExclusionsAsUnorderedList(filter_input(INPUT_POST, "start", FILTER_VALIDATE_INT), filter_input(INPUT_POST, "end", FILTER_VALIDATE_INT));
    http_response_code(200);
    echo $result;
} catch(InvalidArgumentException $e) {
    http_response_code(400);
    echo "Error ".http_response_code().": Ensure the inputs are integers, are not empty, and are above 0.";
}

/**
 * Takes 2 integers and finds all of the numbers between them that do
 * not share factors (excluding 1) with the original 2 integers. It will 
 * format the numbers in an unordered HTML list.
 * 
 * @param integer $start    the starting point for the list
 * @param integer $end      the ending point for the list
 * @return  The HTML unordered list as a string containing the Erdos-Woods numbers.
 */
function getErdosWoodsExclusionsAsUnorderedList($start, $end) {
    include "./get-factors.php";

    //  open the list
    $output = "<ul>";

    //  create an array containing all of the initial factors to compare with
    $start_factors = getFactors($start);
    $end_factors = getFactors($end);
    $initial_factors = array_merge($start_factors, $end_factors);
    $initial_factors = array_unique($initial_factors);
    $initial_factors = array_values($initial_factors);
    unset($initial_factors[0]);    //  remove 1

    //  for each number between, check if any factor is shared with the initial factors
    for($i = $start + 1; $i < $end; $i++) {
        $current_factors = getFactors($i);
        $is_valid = true;
        foreach($current_factors as $current_factor) {
            if(in_array($current_factor, $initial_factors)) {
                $is_valid = false;
                break;
            }
        }
        if($is_valid) 
            $output .= "<li>".$i."</li>";
    }

    $output .= "</ul>";
    return $output;
}

?>
