<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/src/cookie-check/cookie-check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/styles/global-style.css">
    <link rel="stylesheet" href="../../public/styles/register.css">
</head>
<body>
    <section class="login-container column-flex-center">
        <div class="login-card column-flex-center">
            <div class="box">
                <h2>Willy Wangky Choco Factory</h2>
            </div>
            <div class="box">
                <?php
                    if (isset($_POST["username"]) and isset($_POST["password"])) {
                        $user_model_path = $_SERVER["DOCUMENT_ROOT"] . "/src/models/user.php";
                        require_once($user_model_path);
                        $User = new User();

                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        if ($User->get_user($username, $password)) {
                            setcookie("username", $username, time() + (86400 * 30), "/"); // 30 hari, "/" artinya cookie buat seluruh website
                            setcookie("password", $password, time() + (86400 * 30), "/"); 
                            header("Location: /src/dashboard/dashboard.php");
                            exit();
                        } else {
                            echo "<p>Enter the correct uname and password you fucking dumb piece of shit</p>";
                        }
                    } else {
                        echo "<p>Enter ur uname and password</p>";
                    }
                ?>
            </div>
            <div class="column-flex-center box">
                <form action="login.php" method="post" class="column-flex-center">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
    
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password">

                    <input type="submit" value="Login">
                </form>
            </div>
        </div>  
    </section>
</body>
</html>