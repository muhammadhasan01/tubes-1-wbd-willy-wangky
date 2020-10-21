<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/src/cookie-check/cookie-check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../../public/styles/global-style.css">
    <link rel="stylesheet" href="../../public/styles/register.css">
</head>
<body>
    <section class="login-container column-flex-center">
        <div class="login-card column-flex-center">
            <div class="box">
                <h2>Willy Wangky Choco Factory</h2>
            </div>
            <?php
                if (isset($_POST["username"]) and isset($_POST["email"]) and isset($_POST["password"]) and isset($_POST["confirm-password"])) {
                    $user_model_path = $_SERVER["DOCUMENT_ROOT"] . "/src/models/user.php";
                    require_once($user_model_path);
                    $User = new User();

                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $confirmpassword = $_POST["confirm-password"];
                    if ($password == $confirmpassword) {
                        if ($User->insert_user($username, $password, $email)) {
                            setcookie("username", $username, time() + (86400 * 30), "/"); // 30 hari, "/" artinya cookie buat seluruh website
                            setcookie("password", $password, time() + (86400 * 30), "/"); 
                            header("Location: /src/dashboard/dashboard.php");
                            exit();
                        } else {
                            echo "<p>An error occured while we were registering your account. Pls try again.</p>";
                        }
                    } else {
                        echo "<p>Complete all the fields</p>";
                    }
                } else {
                    echo "<p>Complete all the fields</p>";
                }
            ?>
            <div class="column-flex-center box">
                <form action="register.php" method="POST" class="column-flex-center" >
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
    
                    <label for="password">Password</label>
                    <input type="text" id="password" name="password">
                    
                    <label for="confirm-password">Confirm Password</label>
                    <input type="text" id="confirm-password" name="confirm-password">

                    <input type="submit" value="Register">
                </form>
            </div>
        </div>  
    </section>
</body>
</html>