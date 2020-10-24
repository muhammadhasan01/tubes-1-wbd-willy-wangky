<?php
require_once("../models/user.php");

$User_register = new User();

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $result = $User_register->get_user_id($username);
    if ($result === false) {
        echo "ok";
    } else {
        echo "not_ok";
    }
} else {
    echo "not_ok";
}

?>