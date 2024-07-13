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

if(isset($_POST['addfaculty'])){
    $name=$_POST['F_name'];
    $id=$_POST['F_id'];
    $user_email=$_POST['F_email'];
    $user_des=$_POST['F_des'];
    $user_password=$_POST['F_pwd'];
    $cid=$_POST['C_id'];
    $cn=$_POST['C_name'];
    $usertype="faculty";
    
    $sql="INSERT INTO faculty(F_name, F_id, F_email, F_des, F_pwd,C_id, C_name) VALUES('$name','$id', '$user_email', '$user_des', '$user_password','$cid','$cn')";
    
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
  <title>Admin | Add Faculty</title>
 
</head>
<body>
  <header style="background-color:black;" class="header">
    <a href="adminhome.php" class="btn btn-light">ADMIN DASHBOARD</a>
    <div class="logout">
      <a href="home.php" class="btn btn-light">Logout</a>
    </div>
  </header>

  <?php include 'adminsidebar.php'; ?>

  <div class="container pt-5">
    <center>
      <h3>ADD FACULTY</h3>
      <br><br>
      <div>
  <form action="" method="post">
    <table>
      <tr>
        <td><label for="F_name">Faculty Name:</label></td>
        <td><input type="text" id="F_name" name="F_name" required></td>
      </tr>
      <tr>
        <td><label for="F_id">Faculty ID:</label></td>
        <td><input type="number" id="F_id" name="F_id" required></td>
      </tr>
      <tr>
        <td><label for="F_email">Email:</label></td>
        <td><input type="email" id="F_email" name="F_email" required></td>
      </tr>
      <tr>
        <td><label for="F_des">Designation:</label></td>
        <td><input type="text" id="F_des" name="F_des" required></td>
      </tr>
      <tr>
        <td><label for="F_pwd">Password:</label></td>
        <td><input type="password" id="F_pwd" name="F_pwd"></td>
      </tr>
      <tr>
        <td><label for="c_id">CourseID:</label></td>
        <td><input type="number" id="c_id" name="c_id" required></td>
      </tr>
      <tr>
        <td><label for="c_name">CourseName:</label></td>
        <td><input type="text" id="c_name" name="c_name" required></td>
      </tr>
      <tr>
        <td colspan="2"><br><br>
          <input type="submit" name="addfaculty" class="btn btn-success" value="ADD FACULTY">
        </td>
      </tr>
    </table>
  </form>
</div>

   </center>
   

</body>
</html>
