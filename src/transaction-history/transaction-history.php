<?php
    require_once('../cookie-check/cookie-check.php');
    include('../../components/navbar/navbar.php');
?>

<style><?php include '../../public/styles/global-style.css'?></style>
<style><?php include 'transaction-history.css'?></style>

<div class="container">
<div class="title">Transaction History</div>
<?php 
    require_once('../models/transaction.php');
    require_once('../models/user.php');
    $transaction = new Transaction();
    $user = new User();
    $user_id = $user->get_user_id($username);
    // TODO: Use real id user
    $transaction_history = $transaction->get_all_by_id_user($user_id);
    if (empty($transaction_history)) {
        echo "<div class='history-empty'>You have no transaction history yet</div>";
        exit();
    }
?>
<table class="transaction-history">
<tr>
    <th>Chocolate Name</th>
    <th>Amount</th>
    <th>Total Price</th>
    <th>Date</th>
    <th>Time</th>
    <th>Address</th>
</tr>
<?php
    foreach ($transaction_history as $row) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>";
            echo $col;
            echo "</td>";
        }
        echo "</tr>";
    }
?>
</table>
</div>