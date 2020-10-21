<style><?php include 'navbar.css'?></style>
<div class="topnav">
    <a class="active" href="#home">Home</a>
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