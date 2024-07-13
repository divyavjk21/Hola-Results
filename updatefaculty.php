<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "srmsdb";
$data = mysqli_connect($host, $user, $password, $db);
$sql1 = "SELECT * FROM admin WHERE A_ID=?";
$stmt = mysqli_prepare($data, $sql1);
mysqli_stmt_bind_param($stmt, "s", $_SESSION['A_ID']);
mysqli_stmt_execute($stmt);
$result1 = mysqli_stmt_get_result($stmt);
$info1 = $result1->fetch_assoc();
$sql = "SELECT * FROM faculty";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <title>Admin | Update Faculty</title>
</head>
<body>
    <header class="header" style="background-color:black;">
        <a href="adminhome.php" class="btn btn-light">ADMIN DASHBOARD</a>
        <div class="logout">
            <a href="home.php" class="btn btn-light">Logout</a>
        </div>
    </header>

    <?php include 'adminsidebar.php'; ?>

    <div class="content">
        <center>
            <h2>UPDATE FACULTY</h2><br><br>
        
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
          <input type="submit" name="addfaculty" class="btn btn-success" value="UPDATE">
        </td>
      </tr>
    </table>
  </form>
      
</div>
   </center>
   

</body>
</html>
