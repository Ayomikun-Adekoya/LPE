<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "hder");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $id = $_GET['lecturer'];
    $department=  $_GET['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM lecturer_new WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location:add_lecturer.php?id=" . urlencode($department));
    } 
    // Close the statement and connection
    $stmt->close();
    $conn->close();
?>
