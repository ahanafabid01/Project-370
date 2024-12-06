<?php 
require_once'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
    <div class="auth-container">
        <div class="form-container">
            <div class="form-toggle">
                <button id="signInBtn" class="active">Sign In</button>
                <button id="signUpBtn">Sign Up</button>
            </div>
            <form action="includes/login.inc.php" method="post">
                <h2>Sign In</h2>
                <label for="signin-email">Email</label>
                <input type="email" id="signin-email" placeholder="Enter your email" required>
                <label for="signin-password">Password</label>
                <input type="password" id="signin-password" placeholder="Enter your password" required>
                <button type="submit" class="auth-button">Sign In</button>
                <p class="switch-text">Don't have an account? <a href="#" id="switchToSignUp">Sign Up</a></p>
            </form>
            <form action="includes/signup.inc.php" method="post">
                <h2>Sign Up</h2>
                <label for="signup-name">Full Name</label>
                <input type="text" id="signup_name" placeholder="Enter your name" required>
                <label for="signup-email">Email</label>
                <input type="email" id="signup_email" placeholder="Enter your email" required>
                <label for="signup-password">Password</label>
                <input type="password" id="signup_password" placeholder="Create a password" required>
                <button type="submit" class="auth-button">Sign Up</button>
                <p class="switch-text">Already have an account? <a href="#" id="switchToSignIn">Sign In</a></p>
            </form>
        </div>
    </div>
    <?php check_signup_errors();
    ?>
</body>
</html>