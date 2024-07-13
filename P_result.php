<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: student_login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location: student_login.php");
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
$stmt = $data->prepare('SELECT * FROM result WHERE S_id = ?');
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$stu = $stmt->get_result();
$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <style>
        .content{
            padding-left:40px;
        }
    </style>
    <title>Results | View Parent</title>
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
    <header class="header">
        <a href="parenthome.php" class="btn btn-light">PARENT DASHBOARD</a>
        <div class="logout">
         <a href="home.php" class="btn btn-light">Logout</a>   
        </div>
    </header>
    <aside class="aside">
        <ul>
            <li>
                <a href="P_result.php"><b>RESULTS</b></a>
            </li>
            <li>
            <a href="P_profile.php"><b>PROFILE</b></a>
            </li>
            <li>
            <a href="P_stats.php"><b>STATISTICS</b></a>
            </li>
        </ul>
    </aside>

<div class="content">
        <center>
            <h2>RESULTS</h2>
            <br><br>
        </center>
        <center>
            <table border="1px">
            <tr>
                <th class="table_th">Course</th>
                <th class="table_th">CourseID</th>
                <th class="table_th">CGPA</th>
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
                    <?php echo $info['CGPA'];?>
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
