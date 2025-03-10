<?php
require_once("ConnectionFactory.php");
class student{
    //Properties 
    public string $numeration;

    public function __construct(string $numeration) 
    {
        $this->numeration = $numeration; 

    }


// Method to get student user_id
    public function getId(){
    $conn = ConnectionFactory::getConnection();
    $numeration = $this->numeration;
    // Query    
        $sql = "SELECT id
        FROM new
        WHERE numeration = '$numeration'";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['id'] ;
    }
    else{
    return 0;
    }
    ConnectionFactory::closeConnection();
    }



// Method to get student name
    public function getName(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
    //query   
    $sql = "SELECT Surname, Other_names 
    FROM new
    WHERE id = $id;
    ";
    // return the executed query

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $surname= strtoupper($row['Surname']);
        $OtherNames= ucwords($row['Other_names']);
        return  $surname. ", " . $OtherNames ;
    }

    ConnectionFactory::closeConnection();

}



// Method to get student department

public function getDepartment(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
   
    $sql = "SELECT department
    FROM zmain_app
    WHERE user_id = $id";

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




// Method to get student faculty

public function getFaculty(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
   
    $sql = "SELECT faculty
    FROM zmain_app
    WHERE user_id = $id";

$result = mysqli_query($conn, $sql);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result)) {
$facultyId= ($row['faculty']);
}
   
$query = "SELECT faculty
FROM fac_new
WHERE id = $facultyId";

$result2 = mysqli_query($conn, $query);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result2)) {
$faculty= ($row['faculty']);
return $faculty ;
}
    ConnectionFactory::closeConnection();

}








// Method to get student sex

public function getSex(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
   
    $sql = "SELECT sex
    FROM zmain_app
    WHERE user_id = $id";

$result = mysqli_query($conn, $sql);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result)) {
$sex= ($row['sex']);
if($sex==2){
    return "male";
}
else{
    if ($sex==1){
        return "female";
    }
    else{
        return "unknown";
    }
}

}

    ConnectionFactory::closeConnection();

}





// Method to get student degree

public function getDegree(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
   
    $sql = "SELECT degree
    FROM zmain_app
    WHERE user_id = $id";

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






// Method to get student degree

public function getpassword(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
    $sql = "SELECT password
    FROM prev_app
    WHERE user_id = $id";

$result = mysqli_query($conn, $sql);

// Output the data (there should only be one row and one column)
if ($row = mysqli_fetch_assoc($result)) {
$password= ($row['password']);
return $password;
}
   
    ConnectionFactory::closeConnection();

}




public function getCourses(){
    
    $numeration = $this->numeration;

    $conn = ConnectionFactory::getConnection();
    //query   
    $sql = "SELECT coz_id 
    FROM reg_coz
    WHERE appno = '$numeration'
    ";
    // return the executed query
    $courses= array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($courses, ($row['coz_id']));
    }
    return($courses);
    ConnectionFactory::closeConnection();

}


public function getRatedCourses(){
    
    $numeration = $this->numeration;

    $conn = ConnectionFactory::getConnection();

    $sql = "SELECT course_code 
    FROM rate_new
    WHERE numeration = '$numeration'
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