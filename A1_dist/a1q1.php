<?php
/*
I Zachary Sousa, 000872268, certify that this
material is my original work. No other person's
work has been used without suitable acknowledgment
and I have not made my work available to anyone
else.
*/

/**
 * This PHP runs an algorithm on a string passed from
 * a GET request through query paramters. It will
 * respond with the result from the algorithm with 
 * a 200 status code if the input is valid. Otherwise
 * the error is handled and the server will respond
 * with a 400 code and an explanation of the error.
 * Please refer to the function documentation for more
 * information about the algorithm.
 * @author Zachary Sousa
 * @version 202535.00
 * @package COMP 10260 Assignment 1
 */

try {
    $result = determineVictor(htmlspecialchars($_GET["ants"]));
    http_response_code(200);
    echo $result;
} catch(InvalidArgumentException $e) {
    http_response_code(400);
    echo "Error ".http_response_code().": Ensure the string is not empty and only includes 'R', 'B', or 'X'.";
}


/**
 * Determines which ant colony (black or red) wins 
 * the war. Red ants ('R') are assumed to be 
 * travelling left, black ants ('B') are assumed to 
 * be travelling right. 'X' represents an empty spot.
 * If an ant reaches the far side of the opposing 
 * colony's turf the colony is destroyed and the colony 
 * of which that ant is part of wins. If both colonies 
 * make it to the other side, both colonies are destroyed. 
 * If no ants have made it to the other colony's side, 
 * no one has won. When two ants of opposing colonies
 * bump into each other, they both die.
 * 
 * @param string $ant_positions     The string 
 *                                  representing the 
 *                                  ant positions. ex:
 *                                  "BBBXXXRRR".
 * 
 * @return  A string describing who won. Possibilites:
 *          "Neither" - neither colony was destroyed
 *          "Red Wins" - black colony was destroyed
 *          "Black Wins" - red colony was destroyed
 *          "M.A.D." - both colonies were destroyed
 * 
 * @throws \InvalidArgumentException If the string is
 *                                   not set or if 
 *                                   a character does
 *                                   not match R B or
 *                                   X.
 */
function determineVictor($ant_positions) {
    $regex_pattern = '/^[RBX]+$/'; // only R, B, or X is allowed in the string

    //  input validation
    if(!isset($ant_positions)) 
        throw new \InvalidArgumentException('String cannot be empty.');
    if(!preg_match($regex_pattern, $ant_positions))
        throw new \InvalidArgumentException('String can only contain characters R, B, or X.');

    // we don't care about the empty spaces so just get rid of them
    $ant_positions = str_replace('X', "", $ant_positions); 

    $num_red = 0;
    $num_black = 0;
    for($i = 0; $i < strlen($ant_positions); $i++) {
        switch ($ant_positions[$i]) {
            case 'R':
                if($num_black > 0) {    //  handles the fighting between ants
                    $num_black--;
                    break;
                }
                $num_red++;
                break;
            case 'B':
                $num_black++;
                break;
        }
    }

    if($num_black > 0 && $num_red > 0) {
        return "M.A.D.";
    }

    if($num_black == 0 && $num_red == 0) {
        return "Neither";
    }

    if($num_black > 0) {
        return "Black Wins";
    }

    if($num_red > 0) {
        return "Red Wins";
    }
}

?>
