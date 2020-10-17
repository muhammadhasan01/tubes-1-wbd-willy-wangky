<?php 
    include($_SERVER["DOCUMENT_ROOT"] . "/src/cookie-check/cookie-check.php");
    include('../../components/navbar/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../public/styles/global-style.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <div class="topleft">Hello <!-- TODO: Name --></div>
        <a class="topright">View all chocolates</a>
        <!-- TODO: Show Chocolates !-->
        <table class="showcase-products">
            <?php 
                for ($row = 0; $row < 2; $row++) {
                    echo "<tr>";
                    for ($col = 0; $col < 5; $col++) {
                        echo "<td>";
                        include '../../components/card/product-card.php';
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>