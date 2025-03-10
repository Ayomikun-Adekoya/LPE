<?php
require_once("ConnectionFactory.php");

class courses{
    //Properties 
    public $id;
// enacting constructor 
    public function __construct($id)
    {
        $this->id = $id; 
    }

// Method to get course code
public function getCode(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
    // Query    
        $sql = "SELECT course
        FROM course_online
        WHERE id = $id";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['course'] ;
    }
    else{
    return null;
    }
    ConnectionFactory::closeConnection();
    }    

// Method to get course Title
public function getTitle(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
    // Query    
        $sql = "SELECT title
        FROM course_online
        WHERE id = $id";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['title'] ;
    }
    else{
    return null;
    }
    ConnectionFactory::closeConnection();
    }   




// Method to get course unit
public function getUnit(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
    // Query    
        $sql = "SELECT unit
        FROM course_online
        WHERE id = $id";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['unit'] ;
    }
    else{
    return null;
    }
    ConnectionFactory::closeConnection();
    }   


    // Method to get course unit
    public function getlecturerInCharge(){
        $conn = ConnectionFactory::getConnection();
        $code = $this->getCode();

        // Query    
            $sql = "SELECT lecturer_id
            FROM course_assign
            WHERE course_code = '$code'";
        // Execute the query
        $result = mysqli_query($conn, $sql);
        // Output the data (there should only be one row and one column)
        if ($row = mysqli_fetch_assoc($result)) {
        return $row['lecturer_id'] ;
        }
        else{
        return null;
        }
        ConnectionFactory::closeConnection();
        }   
    
    









// Method to get course status
public function getStatus(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
    // Query    
        $sql = "SELECT status
        FROM course_online
        WHERE id = $id";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['status'] ;
    }
    else{
    return null;
    }
    ConnectionFactory::closeConnection();
    }   



}

?>