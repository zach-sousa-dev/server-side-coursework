<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PHP if with == and ===</title>
</head>
<body>
  <h1>Using == and === in if conditions</h1>

  <?php
  $a = "5";   // string
  $b = 5;     // integer

  // Example 1: Loose comparison (==)
  if ($a == $b) {
      echo "<p><strong>Example 1:</strong> <code>'5' == 5</code> → condition is TRUE</p>";
  } else {
      echo "<p><strong>Example 1:</strong> <code>'5' == 5</code> → condition is FALSE</p>";
  }

  // Example 2: Strict comparison (===)
  if ($a === $b) {
      echo "<p><strong>Example 2:</strong> <code>'5' === 5</code> → condition is TRUE</p>";
  } else {
      echo "<p><strong>Example 2:</strong> <code>'5' === 5</code> → condition is FALSE</p>";
  }

  // Example 3: Boolean check with string "0"
  $x = "0";
  if ($x == false) {
      echo "<p><strong>Example 3:</strong> <code>'0' == false</code> → TRUE</p>";
  }

  if ($x === false) {
      echo "<p><strong>Example 3:</strong> <code>'0' === false</code> → TRUE</p>";
  } else {
      echo "<p><strong>Example 3:</strong> <code>'0' === false</code> → FALSE</p>";
  }
  ?>
</body>
</html>