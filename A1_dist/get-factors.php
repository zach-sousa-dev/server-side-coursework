<?php
/*
I Zachary Sousa, 000872268, certify that this
material is my original work. No other person's
work has been used without suitable acknowledgment
and I have not made my work available to anyone
else.
*/

/**
 * This PHP file contains a function for getting all of the factors
 * in order of a number.
 * @author Zachary Sousa
 * @version 202535.00
 * @package COMP 10260 Assignment 1
 */

/**
 * Takes a natural number (not including zero) and finds all the factors
 * in order, and outputs it in an array.
 * 
 * @param integer $num      The number to factorize. Must be above 0.
 * @return  The array containing the factors.
 */
function getFactors($num) {
    $arr = array();
    $arr[] = 1;     //  1 is a factor of all numbers

    if(!is_int($num) || $num <= 0) 
        throw new InvalidArgumentException("Input must be an integer above 0.");

    for($i = 2; $i <= floor((float)$num/2.0); $i++) {
        if($num % $i == 0) {
            $arr[] = $i;
        }
    }

    //  add the original number
    $arr[] = $num;
    return $arr;
}
?>