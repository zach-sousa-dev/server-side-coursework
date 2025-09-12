<!DOCTYPE html>
<html>
<head>
    <title>PHP Switch Example</title>
</head>
<body>
    <h2>Switch Statement Demo</h2>

    <?php
    // Example 1: basic switch
    $target = 2;

    echo "<h3>Example 1: \$target = $target</h3>";
    switch ($target) {
        case 1:
            echo "Value is 1";
            break;
        case 2:
            echo "Value is 2";
            break;
        default:
            echo "Value is not 1 or 2";
            break;
    }

    // Example 2: using rand()
    echo "<h3>Example 2: Random switch using rand(1, 10)</h3>";
    $randomValue = rand(1, 10);
    echo "Random value: $randomValue<br>";

    switch ($randomValue) {
        case 4:
            echo "4!";
            break;
        case 3:
            echo "3!";
            break;
        case 2:
            echo "2!";
            break;
        case 1:
            echo "1!";
            break;
        default:
            echo "Bigger than 4!";
    }
    ?>
</body>
</html>