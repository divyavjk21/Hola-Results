<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="srmsdb";

$data=mysqli_connect($host,$user,$password,$db);
 
if($data==false)
{
    die("Connection error!!");
}
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $name=$_POST['uname'];
    $pass=$_POST['psw'];
    $sql="select * from student where S_id='".$name."' AND S_pwd='".$pass."' ";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
   
    if ($result->num_rows == 1) {
      session_start();
      $_SESSION['username'] = $name;
      $_SESSION['usertype'] = "student";
      header("location: studenthome.php");
  } else {
      session_start();
      $message = " Incorrect Username or Password";
      $_SESSION['loginMessage'] = $message;
      header("location: home.php");
  }
} else {
  header("location: home.php");
  exit(); // Add this line to stop executing the rest of the code
}
?>