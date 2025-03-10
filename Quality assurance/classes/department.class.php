<?php
require_once("ConnectionFactory.php");
class department{
public $id;

public function __construct($id)
    {
        $this->id = $id; 

    }

public function getDepartmentName(){
    $id = $this->id;
    $conn = ConnectionFactory::getConnection();
    // Query    
        $sql = "SELECT department
        FROM dept_new
        WHERE id = $id";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['department'] ;
    }
    else{
    return 0;
    }
    ConnectionFactory::closeConnection();
}


public function getdepartmentalCourses(){

    $id = $this->id;

    $conn = ConnectionFactory::getConnection(); 
    $sql = "SELECT id
    FROM course_online
    WHERE dept = $id";
    // return the executed query
    $courses= array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($courses, ($row['id']));
    }
    return($courses);
    ConnectionFactory::closeConnection();

}

public function getdepartmentalLecturers(){

    $id = $this->id;

    $conn = ConnectionFactory::getConnection(); 
    $sql = "SELECT id
    FROM lecturer_new
    WHERE department = $id";
    // return the executed query
    $lecturer= array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($lecturer, ($row['id']));
    }
    return($lecturer);
    ConnectionFactory::closeConnection();

}


public function getRatedCourses(){
    
    $id = $this->id;

    $conn = ConnectionFactory::getConnection();

    $sql = "SELECT course_code 
    FROM course_assign
    WHERE department_id = $id
    ";
    // return the executed query
    $courses= array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($courses, ($row['course_code']));
    }
  return $courses;
    ConnectionFactory::closeConnection();

}




public function getRatedCoursesId(){
    
    $codes= $this->getRatedCourses();
    $course_id = array();
    $conn = ConnectionFactory::getConnection(); 
    foreach ($codes as $course) {
        
        $sql = "SELECT id 
                FROM course_online
                WHERE course = '$course'
     ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($course_id, ($row['id']));
    }
    }

    return $course_id;
    ConnectionFactory::closeConnection();

}


}

?>