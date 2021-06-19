<?php
    include 'config.php';

    error_reporting(0);

    session_start();

    if(isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if($password == $cpassword) {
            $sql = "SELECT * FROM test WHERE email='$email'";
            $result = mysqli_query($connection, $sql);
            if(!$result->num_rows > 0) {
                $sql = "INSERT INTO test (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($connection, $sql);
                if($result) {
                    echo "<script>alert('Wow! User Registered Successfully.')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Something went wrong.')</script>";
                }
            } else {
                echo "<script>alert('Email already exists!')</script>";
            }
        } else {
            echo "<script>alert('Password Not Matched!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button class="btn" name="submit">Register</button>
            </div>
            <p class="login-register-text">Have an account?<a href="index.php">Login Here</a></p>
        </form>
    </div>
</body>
</html>