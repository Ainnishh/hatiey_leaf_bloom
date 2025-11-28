<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}

?>

<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            background: #1b2e22;
            font-family: Constantia, "Lucida Bright", "DejaVu Serif", Georgia, "serif";
        }

        .login-box {
            width: 350px;
            background: #23422c;
            padding: 25px;
            border-radius: 20px;
            color: white;
            margin: 120px auto;
            text-align: center;
            box-shadow: 0 0 20px rgba(120,190,120,0.4);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
        }

        .btn {
            background: #4db772;
            border: none;
            padding: 10px 20px;
            width: 100%;
            border-radius: 12px;
            color: white;
            cursor: pointer;
        }

        .error {
            color: #ff7c7c;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter Username">
        <input type="password" name="password" placeholder="Enter Password">
        <button class="btn">Login</button>
    </form>
</div>

</body>
</html>
