<?php
require_once("ConnectionFactory.php");
class student{
    //Properties 
    public $matric;

    public function __construct($matric)
    {
        $this->matric = $matric; 

    }


// Method to get student user_id
    public function getId(){
    $conn = ConnectionFactory::getConnection();
    $matric = $this->matric;
    // Query    
        $sql = "SELECT user_id
        FROM prev_app
        WHERE matric = $matric";
    // Execute the query
    $result = mysqli_query($conn, $sql);
    // Output the data (there should only be one row and one column)
    if ($row = mysqli_fetch_assoc($result)) {
    return $row['user_id'] ;
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


// Method to get student name
public function getApplicationNumber(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->getId();
    //query   
    $sql = "SELECT numeration 
    FROM new
    WHERE id = $id
    ";
    // return the executed query

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        return  ($row['numeration']);
    }

    ConnectionFactory::closeConnection();

}



public function getCourses(){
    
    $applicationNumber = $this->getApplicationNumber();

    $conn = ConnectionFactory::getConnection();
    //query   
    $appno= '"'.$applicationNumber.'"';
    $sql = "SELECT coz_id 
    FROM reg_coz
    WHERE appno = $appno
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

}


?>