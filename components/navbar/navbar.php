<?php
    $uri = $_SERVER['REQUEST_URI'];
?>
<style><?php include 'navbar.css'?></style>
<div class="topnav">
    <a class="<?php if (strpos($uri, 'dashboard')!==false) {echo "active";}?>" href="../../index.php">Home</a>
    <!-- TODO: Handle User and Superuser -->
    <a class="<?php if (strpos($uri, 'history')!==false) {echo "active";}?>" href="#news">History</a>
    <?php
        if (isset($_COOKIE["role"])) {
            if ($_COOKIE["role"] === "SUPERUSER") {
                $active = "";
                if (strpos($uri, 'new-chocolate')!==false) {
                    $active = "active";
                }
                echo "<a class=\"" . $active ."\" href=\"/src/new-chocolate/new-chocolate.php\">New Chocolate</a>";   
            }
        }
    ?>
    <input type="text" placeholder="Search">
    <div class="topnav-right">
        <form action="../../components/navbar/navbar.php" method="POST" class="search-bar-form">
            <input type="hidden" name="logout" value="logout">
            <input type="submit" value="Logout" class="logout">    
        </form>
    </div>
</div>
<?php
    if (isset($_POST["logout"])) {
        echo $_COOKIE["username"];
        setcookie("username", "", time() - 3600, "/");
        setcookie("role", "", time() - 3600, "/");
        header('Location: /src/login/login.php');
        exit();
    }
?>