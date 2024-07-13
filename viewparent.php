<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "srmsdb";
$data = mysqli_connect($host, $user, $password, $db);

// Check if connection was successful
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get all student information from the database
$query = "SELECT * FROM parent";
$result = mysqli_query($data, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <title>Admin | View Parent</title>
    <style>
        .table_th {
            padding-left: 20px;
            font-size: 20px;
            margin: 10px;
        }
        .table_td {
            padding-left: 20px;
        }
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            padding-left: 10px;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 1px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    
    <header class="header" style="background-color: black;">
        <a href="adminhome.php" class="btn btn-light">ADMIN DASHBOARD</a>
        <div class="logout">
            <a href="home.php" class="btn btn-light">Logout</a>   
        </div>
    </header>

    <?php include 'adminsidebar.php'; ?>

    <div class="content">
        <center>
            <h2>VIEW PARENT DATA</h2><br><br>
        </center>
        <?php  
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
        <center>
  <table class="table">
    <tr>
      <th class="table_th">Student ID</th>  
      <th class="table_th">Parent Name</th>
      <th class="table_th">Password</th>
      <th class="table_th">Contact</th>
      <th class="table_th">Delete</th>
      <th class="table_th">Update</th>
    </tr>
    <?php while ($info = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td class="table_td"><?php echo $info['S_id']; ?></td>
      <td class="table_td"><?php echo $info['P_name']; ?></td>
      <td class="table_td"><?php echo $info['P_pwd']; ?></td>
      <td class="table_td"><?php echo $info['P_ph']; ?></td>
      <td class="table_td"><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are You Sure to Delete');\" href='delete.php?student_id={$info['userID']}'>Delete</a>"; ?></td>
      <td class="table_td"><?php echo "<a class='btn btn-primary' href='updateparent.php?student_id={$info['userID']}'>Update</a>"; ?></td>
    </tr>
    <?php } ?>
  </table>
</center>
</div>

</body>
</html>
