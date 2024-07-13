<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

if (isset($_POST['update_grade'])) {
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "srmsdb";
    $data = mysqli_connect($host, $user, $password, $db);

    // Check if connection was successful
    if (!$data) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $student_id = $_POST['result_id'];
    $grade = $_POST['update_marks'];

    // Update the grade in the database
    $stmt = $data->prepare("UPDATE result SET grade = ? WHERE S_id = ?");
    $stmt->bind_param("si", $grade, $student_id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the view page
    header("Location: viewresults.php");
    exit;
} else {
    header("Location: viewresults.php");
    exit;
}
