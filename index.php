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
        <div class="input-div">
      <input type="number" name="num1" placeholder="Number one" required>
        <select class="select-button" name="operator" required>
          <option value="add">+</option>
          <option value="substract">-</option>
          <option value="multiply">*</option>
          <option value="divide">/</option>
        </select>
        <input type="number" name="num2" placeholder="Number two" required>
        </div>
        <button>Calculate</button>
      </form>
      
      <?php
      $num1 = null;
      $num2 = null;
      $operator = null; 

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
          "substract" => $num1 - $num2,
          "multiply" => $num1 * $num2,
          "divide" => $num1 / $num2,
        };

        echo "<p class='calc-res'> Result: $res</p>";
      }
      ?>
    </main>
  </body>
</html>