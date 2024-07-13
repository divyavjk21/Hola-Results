<?php
session_start();
   if(!isset($_SESSION['username']))
   {
         header("location:home.php");
   }
   elseif($_SESSION['usertype']=='admin'){
    header("location:home.php");
   }
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
    <title>HOME | Parent</title>

    <style>
        .content{
            padding-left:40px;
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
        <h1>PARENT DASHBOARD</h1>
    </div>

</body>
</html>