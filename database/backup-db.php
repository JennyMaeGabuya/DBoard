<?php
date_default_timezone_set('Asia/Manila');

// Check if this is an automatic backup
$isAutomatic = isset($_GET['automatic']) && $_GET['automatic'] === 'true';

// Define backup directory
$backup_dir = __DIR__ . '/backups';

// Make sure the backup directory exists
if (!file_exists($backup_dir)) {
    mkdir($backup_dir, 0755, true);
}

// Include your database connection
include '../dbcon.php';

$con->set_charset("utf8");

// Database name
$database = 'hr_records';

// Generate backup filename
$backup_file_name = $database . '_backup_' . date('Ymd_His') . '.sql';
$backup_path = $backup_dir . '/' . $backup_file_name;

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

// Save backup to file
file_put_contents($backup_path, $sqlScript);

// Log the backup
file_put_contents($backup_dir . '/backup-log.txt', 
    date('Y-m-d H:i:s') . " - " . ($isAutomatic ? "Automatic" : "Manual") . " backup created: $backup_file_name\n", 
    FILE_APPEND);

// For automatic backups, redirect back without download
if ($isAutomatic) {
    header('Location: ../index.php?backup=automatic_success');
    exit;
}

// For manual backups, force download
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