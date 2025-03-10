<?php
require_once("ConnectionFactory.php");
class lecturer{
    //Properties 
    public $id;

    public function __construct($id)
    {
        $this->id = $id; 

    }





    public function getName(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
    //query   
    $sql = "SELECT name
    FROM lecturer_new
    WHERE id = $id;
    ";
    // return the executed query

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $name= strtoupper($row['name']);
        return $name;
    }

    else{
        return "Lecturer in charge";
    }

    ConnectionFactory::closeConnection();

}





public function getDepartment(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
   
    $sql = "SELECT department
    FROM lecturer_new
    WHERE id = $id";

$result = mysqli_query($conn, $sql);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result)) {
$departmentId= ($row['department']);
}
   
$query = "SELECT department
FROM dept_new
WHERE id = $departmentId";

$result2 = mysqli_query($conn, $query);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result2)) {
$department= ($row['department']);
return $department ;
}
    ConnectionFactory::closeConnection();

}


public function getDegree(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
   
    $sql = "SELECT degree
    FROM lecturer_new
    WHERE id = $id";

$result = mysqli_query($conn, $sql);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result)) {
$degreeId= ($row['degree']);
}
   
$query = "SELECT degree
FROM degree_new
WHERE id = $degreeId";

$result2 = mysqli_query($conn, $query);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result2)) {
$degree= ($row['degree']);
return $degree ;
}
    ConnectionFactory::closeConnection();

}



}


?>