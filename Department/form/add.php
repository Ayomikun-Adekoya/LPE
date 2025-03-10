<?php
$conn = new mysqli("localhost", "root", "", "hder");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lecturerName = $_POST['lecturerName'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO lecturer_new (name, department) VALUES (?, ?)");
    $stmt->bind_param("ss", $lecturerName, $id);

    // Execute the statement
    if ($stmt->execute()) {
      header("Location:add_lecturer.php?id=" . urlencode($id));
        $stmt->close();
        $conn->close();
    }

}
?>

