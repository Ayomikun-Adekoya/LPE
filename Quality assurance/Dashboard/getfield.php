<?php 
session_start();
date_default_timezone_set('Africa/Lagos');
require_once("../classes/ConnectionFactory.php");
$conn = ConnectionFactory::getConnection();
$q=$_GET["q"];
$b=0;
$q2= str_replace("%20"," ", $q);

echo "<div class=form-group>";
echo "<label for=department>Select Department:</label>";
echo "<select class='form-control btn btn-primary submit' id=department name=department required>";
echo "<option value='' selected disabled>Select Department</option>";

$query="SELECT DISTINCT dept_new.department, dept_new.status, dept_new.id from fieldofinterest5 inner join dept_new on dept_new.id=fieldofinterest5.dept where fieldofinterest5.fac = '$q' AND dept_new.status = '0'";//order by name";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

while ($line2 = mysqli_fetch_assoc($result)) {
    $key=array_keys($line2);
    $department=$line2['department'];
    $iddept=$line2['id'];
    $b = $iddept;
    
    echo "<option value=".$iddept.">".$department."</option>"; // $line2[$key[0]]
}
        
echo "</select>"; 
echo "</div>";

ConnectionFactory::closeConnection();
?>