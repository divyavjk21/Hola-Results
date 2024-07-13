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
$sql = "SELECT * FROM parent";
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
    <title>Admin | Update Parent</title>
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
            <h1>UPDATE PARENT</h1>
            <form action="#" method="post">
  <table>
    <tr>
      <td>
        <label for="S_id">Student ID:</label>
      </td>
      <td>
        <input type="number" id="S_id" name="S_id" value="<?php echo "{$info['S_id']}"; ?>" required>
      </td>
    </tr>
    <tr>
      <td>
        <label for="P_name">Parent Name:</label>
      </td>
      <td>
        <input type="text" id="P_name" name="P_name" value="<?php echo "{$info['P_name']}"; ?>" required>
      </td>
    </tr>
    
    <tr>
      <td>
        <label for="S_pwd">Contact:</label>
      </td>
      <td>
        <input type="number" id="ph" name="P_ph" value="<?php echo "{$info['P_ph']}"; ?>" required>
      </td>
    </tr>
    <tr><br><br>
      <td colspan="2"><br>
        <input type="submit" name="update" class="btn btn-success" value="UPDATE">
      </td>
    </tr>
  </table>
</form>
      
</div>
   </center>
   

</body>
</html>
