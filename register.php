<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form class="login-email">
            <p class="login-text">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
            </div>
            <div class="input-group">
                <button class="btn" name="submit">Register</button>
            </div>
            <p class="login-register-text">Have an account?<a href="login.php">Login Here</a></p>
        </form>
    </div>
</body>
</html>