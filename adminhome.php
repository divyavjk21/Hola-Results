<?php
session_start();
   if(!isset($_SESSION['username']))
   {
         header("location:admin_login.php");
   }
   elseif($_SESSION['usertype']=='student'){
    header("location:admin_login.php");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <title>Admin |HOME</title>
    <style>
        .content{
            padding-left:40px;
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="" class="btn btn-light">ADMIN DASHBOARD</a>
        <div class="logout">
         <a href="home.php" class="btn btn-light">Logout</a>   
        </div>
    </header>
    <?php 
    include 'adminsidebar.php';
    ?>
    <div>
        <h1 class="content">ADMIN DASHBOARD</h1>
    </div>

    

</body>
</html>