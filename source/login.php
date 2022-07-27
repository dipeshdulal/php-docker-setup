<?php
    session_start();

    $loggedIn = $_SESSION['logged_in'] ?? false;
    if($loggedIn) {
        header("Location: /dashboard.php");
        exit();
    }

    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";
    if($username == "dipesh" && $password== "secret"){
        $_SESSION['logged_in'] = true;
        header("Location: /dashboard.php");
        exit();
    }
?>
<link rel="stylesheet" href="/styles.css" />
<div class="login">
    <form method="post">
        <div>
            <p>Username:</p>
            <input type="text" name="username" required/> 
        </div>
        <div>
            <p>Password:</p>
            <input type="text" name="password" required /> 
        </div>
        <div>
            <input type="submit" value="Log In" />
        </div>
    </form>
</div>