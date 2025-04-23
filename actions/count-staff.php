<?php

include "dbcon.php";

date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');

$sql = "SELECT COUNT(*) AS total 
        FROM employee 
        WHERE account_status = 1
        AND hr_staff = 1";

$query = $con->query($sql);
$result = $query->fetch_assoc();
$totalCount = $result['total'];

?>