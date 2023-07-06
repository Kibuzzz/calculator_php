<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>Calculator</title>
  </head>
  <body>
    <main>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num1" placeholder="Number one" required>
        <select name="operator" required>
          <option value="add">+</option>
          <option value="substract">-</option>
          <option value="multyply">*</option>
          <option value="divide">/</option>
        </select>
        <input type="number" name="num2" placeholder="Number two" required><br>
        <button>Calculate</button>
      </form>
      
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);
      }

      $error = false;
      if (empty($num1) || empty($num2) || empty($operator)) {
        echo "<p class='calc-error'>Fill in all fields!</p>";
        $error = true;
      }

      if (!is_numeric($num1) || !is_numeric($num2)){
        echo "<p class='calc-error>Only write numbers!</p>";
        $error = true;
      }

      if (!$error) {
        $res = match($operator) {
          "add" => $num1 + $num2,
          "substruct" => $num1 - $num2,
          "multyply" => $num1 * $num2,
          "divide" => $num1 / $num2,
        };

        echo "<p class='calc-res'>$res</p>";
      }
      ?>

    </main>
  </body>
</html>