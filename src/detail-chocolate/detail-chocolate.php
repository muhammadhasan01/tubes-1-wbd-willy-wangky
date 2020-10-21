<?php 
    include("../cookie-check/cookie-check.php");
    include('../../components/navbar/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        require_once('../models/chocolate.php');
        $chocolate = new Chocolate();
        $result = $chocolate->get_by_id($id);
        if ($result){
            echo var_dump($result);
        } else {
            echo "Chocholate not found";
        }
    ?>
</body>
</html>