<?php

// Start session
session_start();




// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["admin"]) && isset($_POST["password"])) {
        $admin = $_POST["admin"];
        $password = $_POST["password"];

        $conn= mysqli_connect("localhost", "root", "", "hder");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT password
        FROM quality_admin
        WHERE username = '$admin'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Output the data (there should only be one row and one column)
        if ($row = mysqli_fetch_assoc($result)) {
        $validPassword = $row['password'] ;
        }
        else{
        $validPassword = null;
        }
        // Close the database connection
        mysqli_close($conn); 

        if ($password == $validPassword){
            header("Location: ../Dashboard/index.php");
            exit();     
        }
        else{
            echo "incorrect username or password";
            exit();    
        }
        }


    }




?>
