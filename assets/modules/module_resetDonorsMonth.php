<?php

date_default_timezone_set('america/sao_paulo');
$timeDay = date('d');
$timeHours = date('H:i:s');
$timeMounth = date('m');

$conection = $mysqli->query("SELECT * FROM fire_transaction ORDER BY sql_id DESC");
while($bindRow = $conection->fetch_assoc()) {

    $paymentId = $bindRow['payment_id'];
    $mounthXI = substr($bindRow['date_created'], 3, 2);
    $username = $bindRow['username'];

    if ($timeMounth > $mounthXI && $bindRow['expired'] == 'false') {

        $query = "UPDATE fire_transaction SET expired = 'true' WHERE payment_id = '$paymentId' AND title = 'Donate'";
        $inject = $mysqli->prepare($query);
        $inject->execute() ? "Payment updated successfully<br>" : "Failed to update payment<br>";

    }

    /*if(isset($bindRow['expired']) && $bindRow['expired'] == 'true'){
        $query_2 = "DELETE FROM fire_tdonors WHERE username = '$username'";
        $inject_2 = $mysqli->prepare($query_2);
        $inject_2->execute() ? "Payment updated successfully<br>" : "Failed to update payment<br>";
    }*/

}
