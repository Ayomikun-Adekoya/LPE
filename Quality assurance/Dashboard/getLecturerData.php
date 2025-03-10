<?php
session_start();
date_default_timezone_set('Africa/Lagos');
require_once("../classes/ConnectionFactory.php");
require_once("../classes/department.class.php");
require_once("../classes/lecturer.class.php");

$faculty = $_GET['faculty'];
$departmentId = $_GET['department'];

$department = new department($departmentId);
$departmentLecturers = $department->getdepartmentalLecturers();

$output = '';

foreach ($departmentLecturers as $lecturer) {
  $lecture = new lecturer($lecturer);
  $lecturerInCharge = $lecture->getName();
  $courses = $lecture->getCourses();
  $lecturerStatus = $lecture->getRatingStatus();
  
  if (empty($courses)){
    $output .= '<tr>';
    $output .= '<td>'.$lecturerInCharge.'</td>';
    $output .= '<td> No course assignment </td>';
    $output .= "<td><a style='background: red;' href='#' class='primary'>No Report</a></td>";
    $output .= '</tr>';
  } else {
    if (empty($lecturerStatus)) {
      $output .= '<tr>';
      $output .= '<td>'.$lecturerInCharge.'</td>';
      $output .= '<td>'.implode(' | ', array_map('htmlspecialchars', $courses)).'</td>';
      $output .= "<td><a style='background: orange;' href='#' class='primary'>No Rating</a></td>";
      $output .= '</tr>';
    } else {
      $output .= '<tr>';
      $output .= '<td>'.$lecturerInCharge.'</td>';
      $output .= '<td>'.implode(' | ', array_map('htmlspecialchars', $courses)).'</td>';
      $output .= "<td><a href='../report/index.php?department=$departmentId&faculty=$faculty&lecturer=$lecturer' class='primary'>View</a></td>";
      $output .= '</tr>';
    }
  }
}

echo $output;
?>