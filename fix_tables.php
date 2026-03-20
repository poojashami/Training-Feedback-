<?php
$conn = new mysqli('localhost', 'root', '', 'db_feedback');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function addColumnIfMissing($conn, $table, $column, $definition) {
    echo "Checking $table.$column... ";
    $result = $conn->query("SHOW COLUMNS FROM `$table` LIKE '$column'");
    if ($result && $result->num_rows == 0) {
        try {
            if ($conn->query("ALTER TABLE `$table` ADD COLUMN `$column` $definition")) {
                echo "ADDED.\n";
            } else {
                echo "FAILED: " . $conn->error . "\n";
            }
        } catch (Exception $e) {
            echo "EXCEPTION: " . $e->getMessage() . "\n";
        }
    } else {
        echo "EXISTS.\n";
    }
}

echo "Updating training_evaluation...\n";
addColumnIfMissing($conn, 'training_evaluation', 'program_id', "VARCHAR(100) AFTER prog_name");
addColumnIfMissing($conn, 'training_evaluation', 'date_from', "DATE AFTER program_id");
addColumnIfMissing($conn, 'training_evaluation', 'date_to', "DATE AFTER date_from");
addColumnIfMissing($conn, 'training_evaluation', 'duration', "VARCHAR(50) AFTER date_to");
addColumnIfMissing($conn, 'training_evaluation', 'conducted_by', "VARCHAR(255) AFTER duration");
addColumnIfMissing($conn, 'training_evaluation', 'organization', "VARCHAR(255) AFTER conducted_by");
addColumnIfMissing($conn, 'training_evaluation', 'coordinator', "VARCHAR(255) AFTER organization");
addColumnIfMissing($conn, 'training_evaluation', 'location_room', "VARCHAR(255) AFTER coordinator");

echo "\nUpdating hostel_feedback...\n";
addColumnIfMissing($conn, 'hostel_feedback', 'training_program', "VARCHAR(255) FIRST");
addColumnIfMissing($conn, 'hostel_feedback', 'program_id', "VARCHAR(100) AFTER training_program");
addColumnIfMissing($conn, 'hostel_feedback', 'duration', "VARCHAR(50) AFTER program_id");
addColumnIfMissing($conn, 'hostel_feedback', 'date', "DATE NULL");

echo "\nFinal schema dump for hostel_feedback:\n";
$res = $conn->query("SHOW COLUMNS FROM hostel_feedback");
while($r = $res->fetch_assoc()) echo $r['Field'] . "\n";

$conn->close();
?>
