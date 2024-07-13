<!DOCTYPE html>
<html>
<head>
    <title>Addition of Two Numbers</title>
</head>
<body>
    <h1>Addition of Two Numbers</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" required><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" required><br><br>
        <input type="submit" value="Add">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1 + $num2;
        echo "<h2>Result: $result</h2>";
    }
    ?>
</body>
</html>
