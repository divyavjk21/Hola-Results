<?php
session_start();

// Check if user is logged in and is an admin
if(!isset($_SESSION['username']) ) {
  header("location:login.php");
  exit;
}

// Establish a database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "srmsdb";
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['userID'], $_POST['studentname'], $_POST['subject'], $_POST['marks'])) {
  $userID = $_POST['userID'];
  $studentname = $_POST['studentname'];
  $subject = $_POST['subject'];
  $marks = $_POST['marks'];
  
  // Insert data into the database
  $sql = "INSERT INTO results (userID, studentname, subject, marks) VALUES ('$userID', '$studentname', '$subject', '$marks')";
  
  // Execute the query
  if (mysqli_query($data, $sql)) {
      echo "Student marks added successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($data);
  }
}
mysqli_close($data);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="selogo.jpeg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <title>Faculty | Enter Marks</title>
 
</head>
<body>
<header class="header">
    <a href="facultyhome.php" class="btn btn-light">ADMIN DASHBOARD</a>
    <div class="logout">
      <a href="home.php" class="btn btn-light">Logout</a>
    </div>
  </header>

  <?php include 'facultysidebar.php'; ?>
	<br><br><center><h2 style="padding-lfet:20px;">Enter Student Marks</h2></center>
	<center><form action="" method="post">
    
		<br><label for="userId">User ID:</label>
		<input type="text" name="userID" required><br><br>
    <br><label for="studentname">Student Name:</label>
    <input type="text" name="studentname" required><br><br>
		<br><label for="subject">Subject:</label>
		<input type="text" name="subject" required><br><br>
		<br><label for="marks">Marks:</label>
		<input type="number" name="marks" required><br><br>
		<br><input type="submit"  class="btn btn-success" value="Submit">
	</form></center>
</body>
</html>