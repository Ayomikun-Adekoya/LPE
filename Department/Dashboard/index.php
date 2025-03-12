<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Montserrat", sans-serif;
      background-color: #f9f9f9;
      color: #333;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar Styles */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 2rem;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .navbar-brand h1 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #0a2b4f;
      margin: 0;
    }

    .logo {
      height: 40px;
      width: auto;
    }

    .logout-btn {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      cursor: pointer;
      font-weight: 500;
      transition: background-color 0.3s;
      text-decoration: none;
      display: inline-block;
    }

    .logout-btn:hover {
      background-color: #c82333;
    }

    /* Main Content Styles */
    .page {
      flex: 1;
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
    }

    .department-header {
      background-color: white;
      border-radius: 12px;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 10px rgba(10, 43, 79, 0.1);
      text-align: center;
    }

    .department-header h1 {
      color: #0a2b4f;
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .courses-section {
      background-color: white;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 4px 10px rgba(10, 43, 79, 0.1);
    }

    .courses-header {
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .courses-header h2 {
      color: #0a2b4f;
      font-size: 1.5rem;
    }

    /* Table Styles */
    .table-container {
      overflow-x: auto;
    }

    .courses-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }

    .courses-table th {
      background-color: #0a2b4f;
      color: white;
      text-align: left;
      padding: 0.75rem 1rem;
      font-weight: 500;
    }

    .courses-table th:first-child {
      border-top-left-radius: 8px;
    }

    .courses-table th:last-child {
      border-top-right-radius: 8px;
    }

    .courses-table tr:nth-child(even) {
      background-color: #f8f9fa;
    }

    .courses-table tr:hover {
      background-color: rgba(10, 43, 79, 0.05);
    }

    .courses-table td {
      padding: 0.75rem 1rem;
      border-bottom: 1px solid #e9ecef;
    }

    /* Button Styles */
    .btn {
      display: inline-block;
      font-weight: 500;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 0.9rem;
      line-height: 1.5;
      border-radius: 4px;
      transition: all 0.15s ease-in-out;
      text-decoration: none;
      margin-right: 0.5rem;
    }

    .btn-warning {
      color: #fff;
      background-color: #f6c23e;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    .btn-primary {
      color: #fff;
      background-color: #0a2b4f;
    }

    .btn-primary:hover {
      background-color: #051c34;
    }

    .btn-success {
      color: #fff;
      background-color: #1cc88a;
    }

    .btn-success:hover {
      background-color: #169b6b;
    }

    .btn-danger {
      color: #fff;
      background-color: #dc3545;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    /* Action Buttons Container */
    .action-buttons {
      text-align: right;
      margin-top: 1.5rem;
      padding-right: 1rem;
    }

    /* Footer Styles */
    .footer {
      background-color: #03182e;
      color: #ccc;
      text-align: center;
      padding: 1.5rem;
      margin-top: 2rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .navbar {
        padding: 0.8rem 1rem;
        flex-direction: column;
      }

      .navbar-brand {
        margin-bottom: 0.5rem;
      }

      .page {
        padding: 1rem;
      }

      .courses-table td, 
      .courses-table th {
        padding: 0.5rem;
      }

      .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        margin-bottom: 0.25rem;
      }
    }
  </style>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar">
    <div class="navbar-brand">
      <img src="images/ui-logo.png" alt="University Logo" class="logo">
      <h1>Quality Assurance Application</h1>
      <img src="images/logo.png" alt="QA Logo" class="logo">
    </div>
    <div>
      <a href="../Login/index.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="page">
    <!-- Department Header -->
    <section class="department-header">
      <h1>Welcome Administrator</h1>
    </section>

    <!-- Courses Section -->
    <section class="courses-section">
      <div class="courses-header">
        <h2>Departmental Courses</h2>
      </div>

      <div class="table-container">
        <table class="courses-table">
          <thead>
            <tr>
              <th>Course Title</th>
              <th>Course Code</th>
              <th>Lecturer(s) in Charge</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("../classes/courses.class.php");
            require_once("../classes/department.class.php");
            require_once("../classes/lecturer.class.php");
            
            $id = $_GET['department'];
            $department = new department($id);
            $courses = $department->getdepartmentalCourses();
            $ratedCourses = $department->getRatedCoursesId();
        
            
            foreach ($courses as $course) {
              $coursesObj = new courses($course);
              $courseTitle = $coursesObj->getTitle();
              $courseCode = $coursesObj->getCode();
              $lecturers = [];
              $lecturerid = $coursesObj->getlecturerInCharge();
              
              foreach ($lecturerid as $value) {
                $lecturer = new lecturer($value);
                array_push($lecturers, $lecturer->getName());
              }

              echo "<tr>";
              echo "<td>".$courseTitle."</td>";
              echo "<td>".$courseCode."</td>";
              
              if (($lecturerid == null)) {
                echo "<td>No assignment</td>";
                echo "<td><a class='btn btn-warning' href='../form/assign_lectuerer.php?id=$id&code=$courseCode&title=$courseTitle'>Assign</a></td>";
              } else {
                echo "<td>".implode(', ', array_map('htmlspecialchars', $lecturers))."</td>";
                echo "<td>
                        <a class='btn btn-primary' href='../form/assign_lectuerer.php?id=$id&code=$courseCode&title=$courseTitle'>Re-assign</a>
                        <a class='btn btn-danger' href='../form/discharge.php?id=$id&code=$courseCode&title=$courseTitle'>Discharge</a>
                      </td>";
              }
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Action Buttons -->
      <div class="action-buttons">
        <a class="btn btn-success" href="../form/add_lecturer.php?id=<?php echo $id; ?>&code=<?php echo $courseCode; ?>&title=<?php echo $courseTitle; ?>">
          <i class="fas fa-user-plus"></i> Add/Remove Lecturer
        </a>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <p>Copyright &copy; The Postgraduate College, All Rights Reserved</p>
  </footer>
</body>

</html>