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
    $name = $_POST['aname'];
    $pass = $_POST['apsw'];
    $sql = "SELECT * FROM admin WHERE A_id = ? AND A_pwd = ?";
    
    $stmt = $data->prepare($sql);
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        session_start();
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";
        header("location: adminhome.php");
    } else {
        session_start();
        $message = "Username or password do not match";
        $_SESSION['loginMessage'] = $message;
        header("location: home.php");
    }
} else {
    header("location: home.php");
    exit(); // Add this line to stop executing the rest of the code
}
?>
