<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS db_feedback";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->select_db('db_feedback');

// Create hostel_feedback table
$sql = "CREATE TABLE IF NOT EXISTS hostel_feedback (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    designation VARCHAR(255),
    id_no VARCHAR(100),
    q1 INT(1), q2 INT(1), q3 INT(1), q4 INT(1), q5 INT(1),
    q6 INT(1), q7 INT(1), q8 INT(1), q9 INT(1), q10 INT(1),
    suggestion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table hostel_feedback created successfully\n";
}

// Create training_evaluation table
$sql = "CREATE TABLE IF NOT EXISTS training_evaluation (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    prog_name VARCHAR(255),
    duration VARCHAR(255),
    date_from DATE,
    date_to DATE,
    dates VARCHAR(255),
    conducted_by VARCHAR(255),
    organization VARCHAR(255),
    t_q1 INT(2), t_q2 INT(2), t_q3 INT(2), t_q4 INT(2), t_q5 INT(2),
    f_q1 INT(2), f_q2 INT(2), f_q3 INT(2),
    general_remarks TEXT,
    participant_name VARCHAR(255),
    cpf_no VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table training_evaluation created successfully\n";
}

$conn->close();
?>
