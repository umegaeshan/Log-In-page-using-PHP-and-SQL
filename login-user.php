<?php 
require_once('connection.php');

$errors = array();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password']; // no escaping needed, only for DB queries

    // Check if email exists
    $query = "SELECT * FROM users_signup WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['full_name'];
            // Here you could start a session
            // session_start();
            // $_SESSION['user_id'] = $user['id'];
            // header('Location: dashboard.php');
            // exit();
        } else {
            $errors['password'] = "Incorrect password!";
        }
    } else {
        $errors['email'] = "No account found with that email!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login-page-style.css">
</head>
<body>

<div class="container">
    <div class="form">
        <h1>Login Form</h1>
        <p class="head_para">Login with your email and password.</p>

        <!-- Display errors -->
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <?php foreach ($errors as $error) { echo $error . "<br>"; } ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="input_boxes">
                <input type="email" name="email" placeholder="Email Address" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <div class="body_para">
                    <a href="">Forgot password?</a>
                </div>
            </div>

            <div class="btn">
                <input type="submit" name="login" value="Login">
            </div>
        </form>

        <div class="footer_para">
            Not yet a Member? 
            <a href="sign-up-form.php">Sign Up now</a>
        </div>
    </div>
</div>

</body>
</html>
