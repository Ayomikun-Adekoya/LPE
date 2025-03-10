<?php
$conn = new mysqli("localhost", "root", "", "hder");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to insert data into database
$sql= "INSERT INTO `rate_new`(`matric`, `course_code`, `enthusiasm`, `warmth`, `credibility`, `comment`) VALUES ( 75566, 'HME 805', 2, 3, 4, 'wrighter')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>