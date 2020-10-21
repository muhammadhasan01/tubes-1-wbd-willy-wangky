<style><?php include 'navbar.css'?></style>
<div class="topnav">
<<<<<<< HEAD
    <a class="active" href="../../index.php">Home</a>
=======
    <a class="active" href="/">Home</a>
>>>>>>> b16beda41dcc812d68d7c55a8380a2b5ff66751c
    <!-- TODO: Handle User and Superuser -->
    <a href="#news">History</a>
    <input type="text" placeholder="Search">
    <div class="topnav-right">
        <form action="../../components/navbar/navbar.php" method="POST">
            <input type="hidden" name="logout" value="logout">
            <input type="submit" value="Logout" class="logout">    
        </form>
    </div>
</div>
<?php
    if (isset($_POST["logout"])) {
        echo $_COOKIE["username"];
        setcookie("username", "", time() - 3600, "/");
        setcookie("password", "", time() - 3600, "/");
        header('Location: /src/login/login.php');
        exit();
    }
?>