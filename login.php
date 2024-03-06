<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: chat.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    
    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(':', $user);
        
        if (trim($storedUsername) === $username && trim($storedPassword) === $password) {
            $_SESSION['username'] = $username;
            header("Location: chat.php");
            exit;
        }
    }

    $error = "Invalid username or password!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <?php if(isset($error)) { echo $error; } ?>
</body>
</html>
