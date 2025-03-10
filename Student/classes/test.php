<?php
require_once("student.class.php");
$num = 'PGS18210319535958';
$student = new student($num);
$dele = $student->getpassword();
print_r($dele);
?>