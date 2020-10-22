<?php 
include("../cookie-check/cookie-check.php");
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
        <div class="topleft">Hello <?php echo $username; ?></div>
        <a class="topright">View all chocolates</a>
        <!-- TODO: Show Chocolates !-->
        <p style="color: blue; text-align: center;" id="buy-msg">
            <?php 
                if (isset($_GET["buy_msg"])){
                    $buy_msg = $_GET["buy_msg"];
                    echo "$buy_msg";
                }
            ?> 
        </p>
        <table class="showcase-products">
            <?php 
                require_once('../models/chocolate.php');
                $chocolate = new Chocolate();
                $all_chocolates = $chocolate->get_all();
                if (empty($all_chocolates)) {
                    echo "<tr><td>We're out of Chocolates :(</td></tr>";
                } else {
                    $rows = floor(count($all_chocolates) / 5) + 1;
                    $columns = count($all_chocolates) - ($rows-1) * 5;
    
                    for ($row = 0; $row < $rows; $row++) {
                        echo "<tr>";
                        for ($col = 0; $col < $columns; $col++) {
                            echo "<td>";
                            include '../../components/card/product-card.php';
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>

    <script>
        setTimeout(function(){
            document.getElementById("buy-msg").style.display = "none";
        }, 3000);
    </script>
</body>
</html>