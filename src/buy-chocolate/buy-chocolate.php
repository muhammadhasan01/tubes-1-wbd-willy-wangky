<?php

$address = $_POST["address"];
$id = $_POST["id"];
$amount = $_POST["amount"];
echo $id;
echo $amount;
echo $address;

//TO DO : kerjakan backend
// kasih notif di dashboard

header("location: /src/dashboard/dashboard.php");

?>