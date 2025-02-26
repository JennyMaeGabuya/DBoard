<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

// Filename for download
$filename = "csv_employees_" . date('Ymd') . ".csv";

// Prevent unexpected output
ob_clean();
header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=$filename");

// Open output stream
$output = fopen("php://output", "w");

// Define column headers
$columns = [
    'AGENCY EMPLOYEE NO.',
    'FIRST NAME',
    'MIDDLE NAME',
    'SURNAME',
    'NAME EXTENSION (JR., SR)',
    'DATE OF BIRTH',
    'PLACE OF BIRTH',
    'SEX',
    'CIVIL STATUS',
    'ADDRESS',
    'BLOOD TYPE',
    'MOBILE NO.',
    'EMAIL ADDRESS',
    'GSIS ID NO.',
    'PAG-IBIG ID NO.',
    'PHILHEALTH NO.',
    'TIN NO.',
    'SSS NO.'
];
fputcsv($output, $columns);

// Fetch data by joining employee and government_info tables
$query = "
    SELECT e.employee_no, e.firstname, e.middlename, e.lastname, e.name_extension, 
           e.dob, e.pob, e.sex, e.civil_status, e.address, e.blood_type, 
           e.mobile_no, e.email_address, 
           g.gsis_no, g.pag_ibig_no, g.philhealth_no, g.tin_no, g.sss_no
    FROM employee e
    LEFT JOIN government_info g ON e.employee_no = g.employee_no
";
$result = $con->query($query);

// Write rows to CSV
while ($row = $result->fetch_assoc()) {
    // Replace NULL values with empty strings to avoid CSV issues
    foreach ($row as &$field) {
        if ($field === null) {
            $field = '';
        }
        // Prevent CSV Injection by prefixing dangerous characters
        if (strpos($field, '=') === 0 || strpos($field, '+') === 0 || strpos($field, '-') === 0 || strpos($field, '@') === 0) {
            $field = "'" . $field; // Add apostrophe to neutralize formula injection
        }
    }
    fputcsv($output, $row);
}

// Close file and database connection
fclose($output);
$con->close();
exit();
?>