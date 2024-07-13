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

// Get student's information from database
/*$stmt = $data->prepare('SELECT * FROM result');
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$stu = $stmt->get_result();
$stmt->close();*/
$stmt = "SELECT * FROM result";
$stu = mysqli_query($data, $stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <title>Admin | View Results</title>
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

        <?php  
        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
<div class="content" class="table-responsive-xl">
        <center>
            <h2> VIEW RESULTS</h2>
        </center>
        <br><br>
        <center>
            <table border="1px">
            <tr>

                <th class="table_th">Course</th>
                <th class="table_th">CourseID</th>
                <th class="table_th">FacultyID</th>
                <th class="table_th">Semester</th>
                <th class="table_th">Credits</th>
                <th class="table_th">Grade</th>
            </tr>
            <?php while($info = $stu->fetch_assoc()) { ?>
            <tr>
                <td class="table_td">
                    <?php echo $info['C_name'];?>
                </td>
                <td class="table_td">
                    <?php echo $info['C_id'];?>
                </td>
                <td class="table_td">
                    <?php echo $info['F_id'];?>
                </td>
                <td class="table_td">
                    <?php echo $info['Sem_no'];?>
                </td>
                <td class="table_td">
                    <?php echo $info['credits'];?>
                </td>
                <td class="table_td">
                    <?php echo $info['grade'];?>
                </td>
            </tr>
            <?php } ?>
            </table>
</center>
</div>


</body>
</html>



