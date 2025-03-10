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

    ConnectionFactory::closeConnection();

}





public function getCourses(){
    $conn = ConnectionFactory::getConnection();
    $id = $this->id;
    //query   
    $sql = "SELECT course_code
    FROM course_assign
    WHERE lecturer_id = $id;
    ";
    // return the executed query

    $courses= array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        array_push($courses, ($row['course_code']));
    }
    return($courses);
    ConnectionFactory::closeConnection();

}





public function getCount(){
    $cummulative = $this->getCumulative();
    $Outstanding = 0;
    $aboveAverage = 0;
    $average = 0;
    $belowAverage = 0;
    $Poor = 0;
    foreach ($cummulative as $value) {
    if ($value[10]== 5) {
        $Outstanding++;
    }

    elseif ($value[10]== 4) {
        $aboveAverage++;
    }

    elseif ($value[10]== 4) {
        $average++;
    }

    elseif ($value[10]== 4) {
        $belowAverage++;
    }

    elseif ($value[10]== 4) {
        $Poor++;
    }


    }

$count =[];

array_push($count, $Outstanding);
array_push($count, $aboveAverage);
array_push($count, $average);
array_push($count, $belowAverage);
array_push($count, $Poor);

return $count;



}


public function getScore(){
    $count = $this->getCount();
    $sum = array_sum($count);
    $score = [];
    foreach ($count as $value) {
        $average = ($value/$sum)*100;
        array_push($score, $average);
    }
    
return $score;

}


public function getRatingStatus(){
    $conn = ConnectionFactory::getConnection();
    $courses = $this->getCourses();
    $lists= array();
    foreach ($courses as $value) {

        $sql = "SELECT numeration
        FROM rate_new
        WHERE course_code = '$value';
        ";
        // return the executed query
    
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            array_push($lists, ($row['numeration']));
        }

   
    }
    
return $lists;

ConnectionFactory::closeConnection();
}



    public function getCumulative(){
    $conn = ConnectionFactory::getConnection();
    
    $cumulativeArray = array();
    $courses = $this->getCourses();
    foreach ($courses as $course) {
    $sql = "SELECT enthusiasm, warmth, credibility, expectation, encoragement, professional, adaptability, knowledgeable, pedagogy, assessment, overall
    FROM rate_new
    WHERE course_code = '$course';
    ";

    $cumulative = array();
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
        array_push($cumulative, ($row['enthusiasm']));
        array_push($cumulative, ($row['warmth']));
        array_push($cumulative, ($row['credibility']));
        array_push($cumulative, ($row['expectation']));
        array_push($cumulative, ($row['encoragement']));
        array_push($cumulative, ($row['professional']));
        array_push($cumulative, ($row['adaptability']));
        array_push($cumulative, ($row['knowledgeable']));
        array_push($cumulative, ($row['pedagogy']));
        array_push($cumulative, ($row['assessment']));
        array_push($cumulative, ($row['overall']));
            }
            array_push($cumulativeArray, $cumulative);
        }
    return($cumulativeArray);
    ConnectionFactory::closeConnection();
    }





function findMean($array) {
        // Check if the array is not empty
        if (count($array) === 0) {
            return 0; // or handle empty array case as needed
        }
    
        // Sum all elements in the array
        $sum = array_sum($array);
    
        // Count the number of elements in the array
        $count = count($array);
    
        // Calculate the mean
        $mean = $sum / $count;
        $mean= ($mean/5)*100;
        return $mean;
    }




public function getTotalCumulative(){
    $cumulative= $this->getCumulative();
    $totalCummulative= []; 
$enthusiasm= [];
$warmth= [];
$credibility= [];
$expectation= [];
$encoragement= [];
$professional= [];
$adaptability= [];
$knowledgeable= [];
$pedagogy= [];
$assessment= [];
$overall= [];
foreach ($cumulative as $value) {
        array_push($enthusiasm, ($value[0]));
        array_push($warmth, ($value[1]));
        array_push($credibility, ($value[2]));
        array_push($expectation, ($value[3]));
        array_push($encoragement, ($value[4]));
        array_push($professional, ($value[5]));
        array_push($adaptability, ($value[6]));
        array_push($knowledgeable, ($value[7]));
        array_push($pedagogy, ($value[8]));
        array_push($assessment, ($value[9]));
        array_push($overall, ($value[10]));
}

$e= $this->findMean($enthusiasm);
array_push($totalCummulative, $e);

$w= $this->findMean($warmth);
array_push($totalCummulative, $w);

$c= $this->findMean($credibility);
array_push($totalCummulative, $c);

$ex= $this->findMean($expectation);
array_push($totalCummulative, $ex);

$en= $this->findMean($encoragement);
array_push($totalCummulative, $en);

$p= $this->findMean($professional);
array_push($totalCummulative, $p);

$a= $this->findMean($adaptability);
array_push($totalCummulative, $a);

$k= $this->findMean($knowledgeable);
array_push($totalCummulative, $k);

$pe= $this->findMean($pedagogy);
array_push($totalCummulative, $pe);

$as= $this->findMean($assessment);
array_push($totalCummulative, $as);

$o= $this->findMean($overall);
array_push($totalCummulative, $o);


return $totalCummulative;

}


public function getAverageScore(){

$array =$this->getTotalCumulative();
$sum= array_sum($array);
$count = count($array);    

$average = $sum/$count;
$averageDP= number_format($average, 2);
return $averageDP;
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