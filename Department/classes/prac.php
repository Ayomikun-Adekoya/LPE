<?php
require_once("courses.class.php");
$lecturer = new courses(650);
$dele = $lecturer->getlecturerInCharge();
echo($dele);
?>