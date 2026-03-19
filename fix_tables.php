<?php
$conn = new mysqli('localhost', 'root', '', 'db_feedback');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS training_calendar (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    sl_no VARCHAR(50),
    training_name VARCHAR(255),
    program_id VARCHAR(100),
    start_date DATE,
    end_date DATE,
    duration INT(5),
    coordinator VARCHAR(255),
    conducted_by VARCHAR(255),
    organization VARCHAR(255),
    room_booked VARCHAR(255),
    location VARCHAR(255),
    feedback_date DATE,
    create_gen_service TINYINT(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table training_calendar created effectively.\n";
} else {
    echo "Error: " . $conn->error . "\n";
}

$conn->close();
?>
