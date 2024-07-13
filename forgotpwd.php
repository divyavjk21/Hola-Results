<?php
// include necessary files and configurations

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    $host="localhost";
    $username="root";
    $password="";
    $dbname="srmsdb";
    
    $data = mysqli_connect($host, $username, $password, $dbname);
    
    if (!$data) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
    
        // check if the email exists in the database
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($data, $query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
    
        if ($count > 0) {
            // generate a random password
            $new_password = rand(100000, 999999);
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
            // update the user's password in the database
            $update_query = "UPDATE user SET password='$hashed_password' WHERE email='$email'";
            mysqli_query($data, $update_query);
    
            // send the new password to the user's email
            $to = $email;
            $subject = "New Password Request";
            $message = "Your new password is: $new_password";
            $headers = "From: example@example.com";
    
            mail($to, $subject, $message, $headers);
    
            // redirect the user to the login page with a success message
            header("Location: home.php?success=1");
            exit;
        } else {
            // redirect the user to the forget password page with an error message
            header("Location: forgetpwd.php?error=1");
            exit;
        }
    }
}
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit" name="submit">Submit</button>
    </form></center>
</body>
</html>


