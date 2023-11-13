
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login | Viper Travels</title>
</head>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="regandlog.php" method="POST">
                <h1>Create Account</h1>
               <br> <br>
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="text" placeholder="Contact No" name="contact" required> 
                <button name="signup-btn">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="regandlog.php" method="POST">
                <h1>Sign In</h1>
                <br> <br>
                <input type="text" placeholder="Username" name="signin-username" required>
                <input type="password" placeholder="Password" name="signin-password" required>
                <a href="#">Forget Your Password?</a>
                <button name="signin-btn">Sign In</button>

            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Tourist!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    <script src="script.js"></script>
</body>

</html>