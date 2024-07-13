<?php
session_start();

// Check if user is logged in and is an admin
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !== 'admin') {
  header("location:home.php");
  exit;
}

$host = "localhost";
$user = "root";
$password = "";
$db = "srmsdb";
$data = mysqli_connect($host, $user, $password, $db);

if(isset($_POST['addstudent'])){
    $username=$_POST['name'];
    $user_id=$_POST['ID'];
    $user_email=$_POST['email'];
    $user_age=$_POST['age'];
    $user_password=$_POST['password'];
    $user_gender=$_POST['gender'];
    $user_att=$_POST['att'];
    $usertype="student";
    
    $sql="INSERT INTO student(S_name, S_id, S_email, S_age, S_pwd, S_gender, S_att) VALUES('$username','$user_id', '$user_email', '$user_age', '$user_password','$user_gender','$user_att')";
    
    $result=mysqli_query($data,$sql);
    if($result){
        echo "<script>alert('Data Uploaded Successfully..')</script>";
    } else {
        echo "Upload Failed!!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="selogo.jpeg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
  <title>Admin | Add Student</title>
 
</head>
<body>
  <header style="background-color:black;" class="header">
    <a href="adminhome.php" class="btn btn-light" >ADMIN DASHBOARD</a>
    <div class="logout">
      <a href="home.php" class="btn btn-light">Logout</a>
    </div>
  </header>

  <?php include 'adminsidebar.php'; ?>

  <div class="container pt-5">
    <center>
      <h3>ADD STUDENT</h3>
      <br><br>

      <div>
  <form action="" method="post">
    <table>
      <tr>
        <td><label for="name">Username:</label></td>
        <td><input type="text" id="name" name="name" required></td>
      </tr>
      <tr>
        <td><label for="ID">Student ID:</label></td>
        <td><input type="number" id="ID" name="ID" required></td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input type="email" id="email" name="email" required></td>
      </tr>
      <tr>
        <td><label for="age">Age:</label></td>
        <td><input type="number" id="age" name="age" required></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label></td>
        <td><input type="password" id="password" name="password" required></td>
      </tr>
      <tr>
        <td><label for="gender">Gender:</label></td>
        <td><input type="text" id="gender" name="gender" required></td>
      </tr>
      <tr>
        <td><label for="att">Attendance:</label></td>
        <td><input type="number" id="att" name="att" required></td>
      </tr>
      <tr>
        <td colspan="2">
          <br>
          <input type="submit" name="addstudent" class="btn btn-success" value="ADD STUDENT">
        </td>
      </tr>
    </table>
  </form>
</div>

   </center>
   

</body>
</html>
