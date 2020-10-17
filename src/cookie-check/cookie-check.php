<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/src/models/user.php");

class CookieChecker {
    public function __construct() {
        // nggatau mau construct apa
    }

    public function check_cookie_exists() {
        if (isset($_COOKIE["username"]) and isset($_COOKIE["password"])) {
            $username = $_COOKIE["username"];
            $password = $_COOKIE["password"];
            return array("username" => $username, "password" => $password);
        } else {
            return false;
        }
    }
}

// langsung jalanin disini aja ya?
$CookieChecker = new CookieChecker();
$cookie_dict = $CookieChecker->check_cookie_exists();
if ($cookie_dict == false and (strpos($_SERVER['REQUEST_URI'], 'login') !== false or strpos($_SERVER['REQUEST_URI'], 'register') !== false)) {
    header('Location: /src/login/login.php');
    exit();
}
if ($cookie_dict !== false and (strpos($_SERVER['REQUEST_URI'], 'login') !== false or strpos($_SERVER['REQUEST_URI'], 'register') !== false)) {
    header('Location: /src/dashboard/dashboard.php');
    exit();
}
?>