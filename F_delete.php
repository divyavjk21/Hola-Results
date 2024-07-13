<?php
 session_start();
   $host="localhost";
   $user="root";
   $password="";
   $db="srmsdb";
   $data=mysqli_connect($host,$user,$password,$db);

    if($_GET['F_id']){
        $user_ID=$_GET['F_id'];
        $sql="DELETE FROM faculty WHERE userID='$F_id'";
        $result=mysqli_query($data,$sql);
        if($result){
            $_SESSION['message']='Delete User is Successful';
            header("location:viewfaculty.php");
        }
    }
   ?>