<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Montserrat", sans-serif;
            background: #f9f9f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar .brand img {
            width: 50px;
        }

        .navbar h1 {
            font-size: 1.5rem;
            color: #0a2b4f;
            font-weight: 600;
        }

        .logout {
            background: #dc3545;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout:hover {
            background: #bb2d3b;
        }

        .page {
            flex: 1;
            padding: 2rem 5%;
        }

        .question-holder {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 4px 4px 10px -2px rgba(3, 24, 46, 0.2);
            text-align: center;
            margin-bottom: 2rem;
        }

        .title {
            font-size: 2rem;
            font-weight: 600;
            color: rgb(38, 38, 38);
        }

        .table-container {
            margin-top: 2rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 4px 4px 10px -2px rgba(3, 24, 46, 0.2);
        }

        .table th, .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background: #0a2b4f;
            color: white;
            font-weight: 600;
        }

        .table tr:hover {
            background: #f1f1f1;
        }

        .btn-primary {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-align: center;
            background: #0a2b4f;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #084075;
        }

        .btn-disabled {
            background: #6c757d;
            cursor: not-allowed;
        }

        footer {
            text-align: center;
            padding: 1rem;
            background: #03182e;
            color: #ccc;
            font-size: 0.9rem;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">
            <img src="images/ui-logo.png" alt="UI Logo">
            <h1>Quality Assurance Application</h1>
        </div>
        <form action="../Login/index.php" method="post">
            <button class="logout" type="submit">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </nav>

    <!-- Main Content -->
    <main class="page">
        <div class="question-holder">
            <?php
            require_once("../classes/student.class.php");
            $numeration = $_GET['numeration'];
            $student = new student($numeration);
            $name = $student->getName();
            echo "<h1 class='title'>Welcome, $name!</h1>";
            ?>
        </div>

        <!-- Courses Table -->
        <div class="table-container">
            <h2 class="title">List of Courses</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Lecturer in Charge</th>
                        <th>Rate Lecturer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../classes/courses.class.php");
                    require_once("../classes/lecturer.class.php");

                    $courses = $student->getCourses();
                    $ratedCourses = $student->getRatedCoursesId();

                    foreach ($courses as $course) {
                        $coursesObj = new courses($course);
                        $courseTitle = $coursesObj->getTitle();
                        $courseCode = $coursesObj->getCode();
                        $lecturerid = $coursesObj->getlecturerInCharge();
                        $lecturer = new lecturer($lecturerid);
                        $lecturerInCharge = $lecturerid ? $lecturer->getName() : "Unavailable";

                        echo "<tr>";
                        echo "<td>$courseTitle</td>";
                        echo "<td>$courseCode</td>";
                        echo "<td>$lecturerInCharge</td>";

                        if (!$lecturerid) {
                            echo "<td><span class='btn-primary btn-disabled'>Unavailable</span></td>";
                        } elseif (in_array($course, $ratedCourses)) {
                            echo "<td><span class='btn-primary btn-disabled'>Rated</span></td>";
                        } else {
                            echo "<td><a class='btn-primary' href='../form/index.php?numeration=$numeration&code=$courseCode&lecturer=$lecturerInCharge'>Rate</a></td>";
                        }

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> The Postgraduate College, All Rights Reserved</p>
    </footer>

</body>
</html>
