<?php
// Include your database conection
include '../dbcon.php'; // assumes $con is created here

$con->set_charset("utf8");

// Set your database name
$database = 'hr_records'; // or manually: $database = 'your_database_name';

// Start SQL script
$sqlScript  = "-- Database Backup\n";
$sqlScript .= "-- Database: `$database`\n";
$sqlScript .= "-- Generated: " . date('Y-m-d H:i:s') . "\n\n";

// Fetch all table names
$tables = [];
$result = $con->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

foreach ($tables as $table) {
    // Drop table if exists
    $sqlScript .= "DROP TABLE IF EXISTS `$table`;\n";

    // Get CREATE TABLE statement
    $resultCreate = $con->query("SHOW CREATE TABLE `$table`");
    $createRow = $resultCreate->fetch_assoc();
    $createTableSql = array_values($createRow)[1];

    $sqlScript .= $createTableSql . ";\n\n";

    // Fetch table data
    $resultData = $con->query("SELECT * FROM `$table`");
    $columnCount = $resultData->field_count;

    while ($row = $resultData->fetch_row()) {
        $sqlScript .= "INSERT INTO `$table` VALUES(";
        for ($i = 0; $i < $columnCount; $i++) {
            $value = isset($row[$i]) ? addslashes($row[$i]) : '';
            $sqlScript .= '"' . $value . '"';
            if ($i < ($columnCount - 1)) $sqlScript .= ',';
        }
        $sqlScript .= ");\n";
    }

    $sqlScript .= "\n";
}

// Send headers and force download
$backup_file_name = $database . '_backup_' . date('Ymd_His') . '.sql';
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

// Output file content
echo $sqlScript;
exit;
?>
