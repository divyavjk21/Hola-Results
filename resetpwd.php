<?php
// include necessary files and configurations

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password == $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // update the user's password in the database
        $update_query = "UPDATE user SET password='$hashed_password' WHERE email='$email'";
        mysqli_query($conn, $update_query);

        // redirect the user to the login page with a success message
        header("Location: login.php?success=2");
        exit;
    } else {
        // redirect the user to the reset password page with an error message
        header("Location: resetpwd.php?email=$email&error=1");
        exit;
    }
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    // redirect the user to the forget password page
    header("Location: forgetpwd.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <center>
    <form action="" method="post">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    </center>
</body>
</html>
