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
$data1 = mysqli_connect($host, $user, $password, $db);
// Check if connection was successful
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get parent's information from database
$stmt = $data->prepare('SELECT * FROM parent WHERE S_id = ?');
$stmt->bind_param("s", $_SESSION['username']);
$stmt->execute();
$pt = $stmt->get_result()->fetch_assoc();
$stmt->close();
$stmt1 = $data1->prepare('SELECT * FROM student WHERE S_id = ?');
$stmt1->bind_param("s", $_SESSION['username']);
$stmt1->execute();
$stu = $stmt1->get_result()->fetch_assoc();
$stmt1->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile | Parent</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
	</head>
    <style>
        .content{
            padding-left:40px;
        }
    </style>
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

    <section class="vh-50" style="background-color: white;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-12 col-lg-10 col-xl-7">
        <div class="card" style="border-radius: 15px; background-color: grey;">
          <div class="card-body p-5">
            <div class="d-flex text-white">
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-2" style="font-size:40px"><span><?php echo $pt['P_name']; ?></span></h5>
               
                <div class="d-flex justify-content-start rounded-3 p-4 mb-4" style="background-color: #efefef;">
                  <div>
                    <p class="small text-muted mb-2">STUDENT ID</p>
                    <p class="mb-0" style="color:black;"><span><?php echo $pt['S_id']; ?></span></p>
                  </div>
                  <div class="px-5">
                    <p class="small text-muted mb-2">Phone No.</p>
                    <p class="mb-0" style="color:black;"><span><?php echo $pt['P_ph']; ?></span></p>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
