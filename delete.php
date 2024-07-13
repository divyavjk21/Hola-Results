<?php
 session_start();
   $host="localhost";
   $user="root";
   $password="";
   $db="srmsdb";
   $data=mysqli_connect($host,$user,$password,$db);

    if($_GET['student_id']){
        $user_ID=$_GET['student_id'];
        $sql="DELETE FROM user WHERE userID='$user_ID'";
        $result=mysqli_query($data,$sql);
        if($result){
            $_SESSION['message']='Delete User is Successful';
            header("location:viewstudent.php");
        }
    }
   ?>