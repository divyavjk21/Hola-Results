<?php
error_reporting(0);
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "srmsdb";

$data = mysqli_connect($host, $user, $password, $db);

if ($data == false) {
    die("Connection error!!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    $pass = $_POST['fpsw'];
    $sql = "SELECT * FROM faculty WHERE F_id = ? AND F_pwd = ?";
    
    $stmt = $data->prepare($sql);
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";
        header("location: facultyhome.php");
    } else {
        session_start();
        $message = "Username or password do not match";
        $_SESSION['loginMessage1'] = $message;
        header("location: home.php");
    }
} else {
    header("location: home.php");
    exit(); // Add this line to stop executing the rest of the code
}
?>
