<style><?php include 'navbar.css'?></style>
<div class="topnav">
    <a class="active" href="../../index.php">Home</a>
    <!-- TODO: Handle User and Superuser -->
    <?php
        require_once("../../src/models/user.php");
        $user = new User();
        $role = $user->get_role($_COOKIE["username"]);
    ?>

    <?php if($role == "USER") : ?>
        <a href="../../src/transaction-history/transaction-history.php">History</a>
    <?php elseif($role == "SUPER_USER") : ?>
        <a href="../../src/new-chocolate/new-chocolate.php">Add New Chocolate</a>
    <?php endif; ?>

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