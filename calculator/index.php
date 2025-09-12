<!DOCTYPE html>
<html>
    <head>
        <title>Math Operations</title>
    </head>
<body>

    <?php
        // Include the math_functions.php file
        include "math_functions.php";

        // Test values
        $number1 = 10;
        $number2 = 5;

        // Addition
        $sum = add($number1, $number2);
        echo "The sum of $number1 and $number2 is: $sum<br>";

        // Subtraction
        $diff = subtract($number1, $number2);
        echo "Subtracting $number2 from $number1 gives: $diff<br>";

        // Multiplication
        $product = multiply(7, 3);
        echo "Multiplying 7 and 3 results in: $product<br>";

        // Division with valid divisor
        $result = divide(20, 4);
        if (is_nan($result))
            echo "Division by 0 not allowed.<br>";
        else 
            echo "Dividing 20 by 4 gives: $result<br>";

        // Division by zero
        $result = divide(15, 0);
        if (is_nan($result))
            echo "Division by 0 not allowed.<br>";
        else 
            echo "Dividing 15 by 0 gives: $result<br>";
    ?>

</body>
</html>