<?php

include "dbcon.php";

date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');

$sql = "SELECT COUNT(*) AS total FROM hr_staffs WHERE LOWER(role) NOT LIKE '%mayor%'";
$query = $con->query($sql);
$result = $query->fetch_assoc();
$totalCount = $result['total'];

?>