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
            <div class="column-flex-center box">
                <form class="column-flex-center" action="register">
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