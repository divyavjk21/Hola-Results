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
$sql = "SELECT * FROM student";
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
    <title>Admin | Update Student</title>
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
            <h1>UPDATE STUDENT</h1>
            <form action="#" method="post">
  <table>
    <tr>
      <td>
        <label for="S_id">STUDENT ID:</label>
      </td>
      <td>
        <input type="number" id="S_id" name="S_id" value="<?php echo "{$info['S_id']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="S_name">Username:</label>
      </td>
      <td>
        <input type="text" id="S_name" name="S_name" value="<?php echo "{$info['S_name']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="S_email">Email:</label>
      </td>
      <td>
        <input type="email" id="S_email" name="S_email" value="<?php echo "{$info['S_email']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="S_pwd">Password:</label>
      </td>
      <td>
        <input type="password" id="S_pwd" name="S_pwd" value="<?php echo "{$info['S_pwd']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="S_age">Age:</label>
      </td>
      <td>
        <input type="number" id="S_age" name="S_age" value="<?php echo "{$info['S_age']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="S_gender">Gender:</label>
      </td>
      <td>
        <input type="number" id="S_gender" name="S_gender" value="<?php echo "{$info['S_gender']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="S_att">Attendance:</label>
      </td>
      <td>
        <input type="number" id="S_att" name="S_att" value="<?php echo "{$info['S_att']}"; ?>" required>
      </td>
    </tr>
    <tr><br><br>
      <td colspan="2">
        <input type="submit" name="update" class="btn btn-success" value="UPDATE">
      </td>
    </tr>
  </table>
</form>
      
</div>
   </center>
   

</body>
</html>
