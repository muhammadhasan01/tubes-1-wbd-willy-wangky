<?php
require_once("../models/user.php");

$User_register = new User();

if (isset($_GET["username"]) and isset($_GET["password"])) {
    $username = $_GET["username"];
    $password = $_GET["password"];
    $result = $User_register->get_user($username, $password);
    if ($result !== false) {
        echo "ok";
    } else {
        echo "not_ok";
    }
} else {
    echo "not_ok";
}

?>