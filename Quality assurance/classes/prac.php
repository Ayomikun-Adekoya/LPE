<?php
require_once("lecturer.class.php");
$lecturer = new lecturer(33);
$dele = $lecturer->getRatingStatus();
print_r($dele);
?>
