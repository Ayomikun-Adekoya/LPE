<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Postgraduate college</title>

  <style>
    /* Base button styles */

body {
  font-family: "Times New Roman", Times, serif;
}

/* If you want to target specific elements */
h1, h2, h3, p, li {
  font-family: "Times New Roman", Times, serif;
}
table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
</style>
</head>
<body>
<p style ="text-align: center; text-transform: uppercase; font-weight: bold">DIRECTORATE OF QUALITY ASSURANCE</p> 
<p style ="text-align: center; text-transform: uppercase; font-weight: bold">UNIVERSITY OF IBADAN</p> 
<p style ="text-align: center; text-transform: uppercase; font-weight: bold">ASSESSMENT OF LECTURERS BY STUDENTS</p> 
<br>
<br>

<div style="margin-left: 15%; margin-right: 15%;">
        <div style ="font-weight: bold">
        <?php
                  require_once("../classes/courses.class.php");
                  require_once("../classes/department.class.php");
                  require_once("../classes/lecturer.class.php");
                              $dept = $_GET['department'];
                              $faculty = $_GET['faculty']; 
                              $lecture = $_GET['lecturer'];
                              $department = new department($dept);
                              $lecturer= new lecturer($lecture); 
                              $departmentName= $department->getDepartmentName();  
                              $lecturerName= $lecturer->getName();    
                              $courses= $lecturer->getCourses();
        
                              $conn= mysqli_connect("localhost", "root", "", "hder");
                              if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                              }
                              $sql = "SELECT faculty
                              FROM fac_new
                              WHERE id = $faculty";
                          // Execute the query
                          $result = mysqli_query($conn, $sql);
                          if ($row = mysqli_fetch_assoc($result)) {
                      $facultyName = $row['faculty'];
                              }
                              $courseTitles= [];
                              foreach ($courses as $value) {
                                $sql2 = "SELECT title
                                FROM course_online
                                WHERE course = '$value'";
                                    $result = mysqli_query($conn, $sql2);
                                    // Output the data (there should only be one row and one column)
                                    if ($row = mysqli_fetch_assoc($result)) {
                                    array_push($courseTitles,  $row['title']) ;
                                    }
                                }
                                

                                echo '<p>Faculty:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  '.$facultyName.'</p>';
                                echo '<p>Department:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.$departmentName.'</p>';
                                echo '<p>Name of Lecturer:  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'.$lecturerName.'</p>';
                                echo '<p>Course Code:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.implode(' , ', array_map('htmlspecialchars', $courses)).'</p>';
                                echo '<p>Course Title: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '.implode(' , ', array_map('htmlspecialchars', $courseTitles)).'</p>';
        ?>
           
            
        </div>


<br>
<br>

<div>
<p style ="text-align: center; font-weight: bold">Table 1: Lecturer's rating in comparison with other Lecturers</p>

<table>
        <thead>
            <tr>
            <th>S/N</th>
            <th>Rating</th>
            <th>Count</th>
            <th>Score (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                echo "<tr>";
                echo "<td>1</td>";
                echo "<td>Outstanding</td>";
                echo "<td>".$lecturer->getCount()[0]."</td>";
                echo "<td>".$lecturer->getScore()[0]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>2</td>";
                echo "<td>Above Average</td>";
                echo "<td>".$lecturer->getCount()[1]."</td>";
                echo "<td>".$lecturer->getScore()[1]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>3</td>";
                echo "<td>Average</td>";
                echo "<td>".$lecturer->getCount()[2]."</td>";
                echo "<td>".$lecturer->getScore()[2]."</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<td>4</td>";
                echo "<td>Below Average</td>";
                echo "<td>".$lecturer->getCount()[3]."</td>";
                echo "<td>".$lecturer->getScore()[3]."</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<td>5</td>";
                echo "<td>Poor</td>";
                echo "<td>".$lecturer->getCount()[4]."</td>";
                echo "<td>".$lecturer->getScore()[4]."</td>";
                echo "</tr>";



            ?>
        </tbody>
    </table>

</div>

<br>
<br>
<br>

<div>
<p style ="text-align: center; font-weight: bold">Table 2: Lecturer's Scores</p>

<table>
        <thead>
            <tr>
            <th>S/N</th>
            <th>Features Assessed</th>
            <th>Score (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                echo "<tr>";
                echo "<td>1</td>";
                echo "<td>Enthusiasm</td>";
                echo "<td>".$lecturer->getTotalCumulative()[0]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>2</td>";
                echo "<td>Warmth</td>";
                echo "<td>".$lecturer->getTotalCumulative()[1]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>3</td>";
                echo "<td>Credibility</td>";
                echo "<td>".$lecturer->getTotalCumulative()[2]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>4</td>";
                echo "<td>Expectation for Student's Success</td>";
                echo "<td>".$lecturer->getTotalCumulative()[3]."</td>";
                echo "</tr>";


                echo "<tr>";
                echo "<td>5</td>";
                echo "<td>Encouraging and Patient</td>";
                echo "<td>".$lecturer->getTotalCumulative()[4]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>6</td>";
                echo "<td>Professionalism</td>";
                echo "<td>".$lecturer->getTotalCumulative()[5]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>7</td>";
                echo "<td>Adaptability/Flexibility</td>";
                echo "<td>".$lecturer->getTotalCumulative()[6]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>8</td>";
                echo "<td>Knowledgeable</td>";
                echo "<td>".$lecturer->getTotalCumulative()[7]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>9</td>";
                echo "<td>Pedagogy</td>";
                echo "<td>".$lecturer->getTotalCumulative()[8]."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>10</td>";
                echo "<td>Periodic Assessment of Students (Tests/Assignments)</td>";
                echo "<td>".$lecturer->getTotalCumulative()[9]."</td>";
                echo "</tr>";


            ?>
        </tbody>
    </table>
    <br>
    <br>
    <div>
        <?php
                echo '<h4 style="text-align: right;">AVERAGE SCORE = '.$lecturer->getAverageScore().'</h4>';

                header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document.doc");
        ?>
        
    </div>
<br>
<br>
<br>

</div>
</div>

</body>
</html>
