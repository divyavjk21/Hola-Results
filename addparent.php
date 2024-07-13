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

if(isset($_POST['addparent'])){
    $name=$_POST['P_name'];
    $id=$_POST['S_id'];
    $pwd=$_POST['P_pwd'];
    $ph=$_POST['P_ph'];
    $usertype="parent";
    
    $sql="INSERT INTO parent(P_name, S_id, P_email, P_pwd,P_ph) VALUES('$name','$id','$pwd','$ph')";
    
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
  <title>Admin | Add Parent</title>
 
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
      <h3>ADD PARENT</h3>
      <br><br>
      <form action="" method="post">
      <div>
  <form action="" method="post">
    <table>
      <tr>
        <td><label for="P_name">Parent Name:</label></td>
        <td><input type="text" id="P_name" name="P_name" required></td>
      </tr>
      <tr>
        <td><label for="S_id">Student ID:</label></td>
        <td><input type="number" id="S_id" name="S_id" required></td>
      </tr>
      <tr>
        <td><label for="P_email">Email:</label></td>
        <td><input type="email" id="P_email" name="P_email" required></td>
      </tr>
      <tr>
        <td><label for="P_pwd">Password:</label></td>
        <td><input type="password" id="P_pwd" name="P_pwd"></td>
      </tr>
      <tr>
        <td><label for="P_ph">Contact:</label></td>
        <td><input type="number" id="P_ph" name="P_ph" required></td>
      </tr>
      <tr>
        <td colspan="2">
          <br><br>
          <input type="submit" name="addparent" class="btn btn-success" value="ADD PARENT">
        </td>
      </tr>
    </table>
  </form>
</div>

   </center>
   

</body>
</html>
