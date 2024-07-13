<?php
 session_start();
   $host="localhost";
   $user="root";
   $password="";
   $db="srmsdb";
   $data=mysqli_connect($host,$user,$password,$db);

    if($_GET['S_id']){
        $user_ID=$_GET['S_id'];
        $sql="DELETE FROM student WHERE userID='$S_id'";
        $result=mysqli_query($data,$sql);
        if($result){
            $_SESSION['message']='Delete User is Successful';
            header("location:viewstudent.php");
        }
    }
   ?>