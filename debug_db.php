<?php
define('ENVIRONMENT', 'development');
define('BASEPATH', 'debug');
include 'application/config/database.php';
$config = $db['default'];

$mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], $config['database']);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

echo "Database Connection successful!\n";

$result = $mysqli->query("SHOW TABLES LIKE 'hostel_feedback'");
if ($result->num_rows > 0) {
    echo "Table 'hostel_feedback' exists.\n";
} else {
    echo "Table 'hostel_feedback' does NOT exist.\n";
}

$result = $mysqli->query("SHOW TABLES LIKE 'training_evaluation'");
if ($result->num_rows > 0) {
    echo "Table 'training_evaluation' exists.\n";
} else {
    echo "Table 'training_evaluation' does NOT exist.\n";
}

$mysqli->close();
echo "Done.\n";
