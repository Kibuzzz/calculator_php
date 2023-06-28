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
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <input type="number" name="num1" placeholder="Number one">
        <select>
          <option value="add">+</option>
          <option value="substracr">-</option>
          <option value="multyply">*</option>
          <option value="divide">/</option>
        </select>
        <input type="number" name="num2" placeholder="Number two">
      </form>
    </main>
  </body>
</html>