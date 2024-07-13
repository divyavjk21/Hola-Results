<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <link rel="stylesheet"  type="text/css" href="style.css"/>
    <link rel="stylesheet" href="style2.css">
    <title>Hola! Results</title>
</head>

<body>
    <nav>
        <label for="" class="logo">Hola! Results</label>
    <ul>
        <li><a href="#welcome">Home</a></li>
        <li><a href="#aboutus">About Us</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
  <button class="btn btn-danger dropdown-toggle" role="button" id="dropdownMenuButtonLink" data-bs-toggle="dropdown" aria-expanded="false">
    Login
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
  <li><button onclick="document.getElementById('id01').style.display='block'" class="dropdown-item" >Student Login</button></li>
  <li><button onclick="document.getElementById('id02').style.display='block'" class="dropdown-item" style="width:auto;">Faculty Login</button></li>
        <li><button onclick="document.getElementById('id03').style.display='block'" class="dropdown-item" style="width:auto;">Admin Login</button></li>
        <li><button onclick="document.getElementById('id04').style.display='block'" class="dropdown-item" style="width:auto;">Parent Login</button></li> 
  </ul>
</li>
        <!--<li><button onclick="document.getElementById('id01').style.display='block'" class="btn btn-dark" style="width:auto;">S_Login</button></li>
        <li><button onclick="document.getElementById('id02').style.display='block'" class="btn btn-dark" style="width:auto;">F_Login</button></li>
        <li><button onclick="document.getElementById('id03').style.display='block'" class="btn btn-dark" style="width:auto;">A_Login</button></li>
        <li><button onclick="document.getElementById('id04').style.display='block'" class="btn btn-dark" style="width:auto;">P_Login</button></li>
    -->
      </ul> 
</nav>
<div id="id01" class="modal">
  <form class="modal-content animate" action="student_login.php" method="POST">
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
  <label for="uname"><b>User ID</b></label>
  <input type="text" placeholder="Enter UserID" name="uname" required>
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

<div id="id02" class="modal">
  <form class="modal-content animate" action="faculty_login.php" method="POST">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  <div class="container">
    <h4>
    <?php error_reporting(0);
    session_start();
    session_destroy();
    echo $_SESSION['loginMessage1']?>
    </h4>
  <label for="fname"><b>User ID</b></label>
  <input type="text" placeholder="Enter UserID" name="fname" required>
  <label for="fpsw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="fpsw" required>
  <button type="submit" value="Login">Login</button>
  <label>
  <input type="checkbox" checked="checked" name="remember"> Remember me</label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="forgotpwd.php">Forgot password?</a></span>
  </div>
</form>
</div>

<div id="id03" class="modal">
  <form class="modal-content animate" action="admin_login.php" method="POST">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  <div class="container">
    <h4>
    <?php error_reporting(0);
    session_start();
    session_destroy();
    echo $_SESSION['loginMessage2']?>
    </h4>
  <label for="aname"><b>User ID</b></label>
  <input type="text" placeholder="Enter UserID" name="aname" required>
  <label for="apsw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="apsw" required>
  <button type="submit" value="Login">Login</button>
  <label>
  <input type="checkbox" checked="checked" name="remember"> Remember me</label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="forgotpwd.php">Forgot password?</a></span>
  </div>   
</form>
</div>

<div id="id04" class="modal">
  <form class="modal-content animate" action="parent_login.php" method="POST">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  <div class="container">
    <h4>
    <?php error_reporting(0);
    session_start();
    session_destroy();
    echo $_SESSION['loginMessage3']?>
    </h4>
  <label for="uname"><b>User ID</b></label>
  <input type="text" placeholder="Enter UserID" name="uname" required>
  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="psw" required>
  <button type="submit" value="Login">Login</button>
  <label>
  <input type="checkbox" checked="checked" name="remember"> Remember me</label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="forgotpwd.php">Forgot password?</a></span>
  </div>
</form>
</div>

<div class="section1">
<marquee class="mar" behavior="" direction=""><b>🎢WELCOME TO ABC EDUCATIONAL INSTITUTIONS🏫</b></marquee>
<marquee class="mar"behavior="" direction="right"><b>Hola! Results..Login to Check Results!!</b></marquee>
  <br><br><br> <img class="main_img" src="sebg.jpg" alt="img" width="300px" height="300px">
</div>

<div class="container" style="font-size: large;">
    <div class="row">
        <div class="col-md-4">
        <img src="selogo.jpeg" class="img-thumbnail" class="welcome_img"  class="rounded-circle" alt="">
        </div>
        <div class="col-md-8">
        <h1 id="welcome" class="aboutus" style="color: purple;font-weight: bold;" >Welcome to Hola! Results</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda veniam fugit laborum voluptatibus doloribus ratione explicabo vero reiciendis impedit aliquam. Temporibus animi rem beatae dolores nam aperiam perferendis delectus iste. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur vitae quae saepe quo deserunt eius. Consequuntur cum natus soluta placeat neque ipsa impedit totam dolorum maiores, quia quibusdam reiciendis pariatur.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab at ratione illum excepturi reiciendis nemo sed aut in consequatur, eaque, dignissimos, corporis libero nisi. Earum dicta asperiores dolorem vero. Totam!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore nobis est porro excepturi eaque consequuntur libero quas incidunt non, recusandae adipisci mollitia, similique deserunt, necessitatibus deleniti eos facere hic nesciunt?</p>
        </div>
    </div>
</div>

<center style="font-size: large;">
    <h1 id="aboutus" style="color: purple;font-weight: bold;" >About Us</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, sint quaerat possimus asperiores quo id itaque necessitatibus voluptatum maiores, ad quis sit aut, quasi commodi rem dolore! Recusandae, ea ipsa. Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim dolores, fuga consectetur, repudiandae esse, ab excepturi earum eaque laudantium vitae possimus incidunt odit sed placeat voluptate dolorem aliquid corrupti? Assumenda.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius molestiae exercitationem quibusdam ipsam temporibus perspiciatis hic aperiam culpa, et amet, voluptates voluptatum rerum corporis placeat blanditiis laudantium nisi odit perferendis.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nostrum quae modi unde distinctio at magni eveniet fuga temporibus veritatis odit amet impedit porro ab, assumenda enim, a facilis quia.</p>
</center>
<br><br>

<center id="contact">
<div class="tour" style="font-size: large;color: purple;font-weight: bold;">Take a Tour ...</div>
    <br>
    <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="t3.jpg" class="rounded-circle" style="width:50%">
          
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="t2.jpg" class="rounded-circle" style="width:50%">
        
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="t1.jpeg" class="rounded-circle" style="width:50%">
          
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>

        <br>
        <br>
        <br>
    <h3 class="aboutus" style="font-size: largeer;color: purple;font-weight: bold;">Contact Us</h3>
    <p>Mail:holaresults@gmail.com</p>
    <p>Website:www.holaresults.com</p>
    <p>Landline:0123456789</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61205.56846079796!2d80.6387712!3d16.5085184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1675005345595!5m2!1sen!2sin" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</center>

<div class="footer" style="font-size: large;background-color: cornflowerblue;color: white;font-weight: bold;">
&copy All rights Reserved 2023
</div>  
<script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";}
          }

          var modal = document.getElementById('id02');
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";}
          }

          var modal = document.getElementById('id03');
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";}
          }  
          
          var modal = document.getElementById('id04');
        window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";}
          }

        </script>

</body>
</html>