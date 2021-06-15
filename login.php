<?php
    include 'config.php';

    error_reporting(0);

    session_start();

    if(isset($_SESSION['username'])) {
        header("Location: welcome.php");
    }

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM test WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connection, $sql);
        if($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: welcome.php");
        } else {
            echo "<script>alert('Email or Password is wrong')</script>";
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
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Login with Email</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>"required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $POST['password']; ?>"required>
            </div>
            <div class="input-group">
                <button class="btn" name="submit">Login</button>
            </div>
            <p class="login-register-text">Don't have an account?<a href="register.php">Register Here</a></p>
        </form>
    </div>
</body>
</html>