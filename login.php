<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login  |Hola! Results</title>
  <link rel="icon" type="image/x-icon" href="selogo.jpeg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style2.css">
  </head>

  <body>
    <br><br>
  <h2 class="srms">STUDENT RESULT DATABASE MANAGEMENT SYSTEM</h2>
  <br>
  <marquee class="mar" behavior="" direction=""><b>🎢WELCOME TO ABC EDUCATIONAL INSTITUTIONS🏫</b></marquee>
  <br><marquee class="mar" behavior="" direction="right"><b>Hola! Results</b></marquee>
  <br><button onclick="document.getElementById('id01').style.display='block'" class="login-btn" style="width:auto;">Login</button>
  <div id="id01" class="modal">
    <form class="modal-content animate" action="afterlogin_page.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <div class="container">
      <h4>
      <?php error_reporting(0);
      session_start();
      session_destroy();
      echo $_SESSION['loginMessage']?>
      </h4>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <button type="submit" value="Login">Login</button>
    <label>
    <input type="checkbox" checked="checked" name="remember"> Remember me</label>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="forgotpwd.php">Forgot password?</a></span>
    </div>
        
  </form>
  </div>

<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";}
}
</script>

</body>
</html>
    