<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Quality Assurance Application</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    /* Reset and Base Styles */
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
      color: #262626;
    }

    /* Colors */
    :root {
      --primary: #0a2b4f;
      --secondary: #1cc88a;
      --danger: #dc3545;
      --warning: #f6c23e;
      --light: #f8f9fc;
      --dark: #03182e;
      --gray: #e8e8e8;
      --text: #262626;
    }

    /* Navbar Styles */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 4rem;
      width: 100%;
      background: #fff;
      padding: 0 2rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .logo {
      height: 40px;
      width: auto;
    }

    .app-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary);
      margin: 0;
    }

    .navbar-nav {
      display: flex;
      align-items: center;
      list-style: none;
    }

    .topbar-divider {
      width: 0;
      border-right: 1px solid #e3e6f0;
      height: 2rem;
      margin: 0 1rem;
    }

    /* Button Styles */
    .btn {
      display: inline-block;
      font-weight: 600;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.5rem 1rem;
      font-size: 0.9rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: all 0.15s ease-in-out;
      cursor: pointer;
      text-decoration: none;
    }

    .btn-primary {
      color: #fff;
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: #08213c;
    }

    /* Navigation actions */
    .logout {
      background: none;
      border: none;
      cursor: pointer;
      margin-left: 0.5rem;
    }

    .logout a {
      display: flex;
      align-items: center;
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
      padding: 0.5rem 0.75rem;
      border-radius: 0.25rem;
      transition: all 0.15s ease-in-out;
    }

    .logout a:hover {
      background-color: var(--primary);
      color: #fff;
    }

    .logout a i {
      margin-right: 0.5rem;
    }

    /* Main Content Styles */
    .page {
      flex: 1;
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
    }

    .question-holder {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem;
      margin-bottom: 2rem;
      background-color: white;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(3, 24, 46, 0.1);
    }

    .title {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1rem;
      text-align: center;
    }

    /* Form Styles */
    .contain {
      background-color: white;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(3, 24, 46, 0.1);
      padding: 2rem;
      margin-bottom: 2rem;
    }

    #feechecker {
      max-width: 600px;
      margin: 0 auto 2rem;
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: var(--primary);
    }

    .form-control {
      display: block;
      width: 100%;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: 0.5rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
      border-color: var(--primary);
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(10, 43, 79, 0.25);
    }

    select.form-control {
      cursor: pointer;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%230a2b4f' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 1rem center;
      padding-right: 2.5rem;
    }

    /* Table Styles */
    .table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      margin-top: 1.5rem;
      background-color: white;
      border-radius: 0.5rem;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(3, 24, 46, 0.05);
    }

    .table th,
    .table td {
      padding: 1rem;
      vertical-align: middle;
      text-align: left;
      border-bottom: 1px solid #e3e6f0;
    }

    .table th {
      background-color: var(--primary);
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 0.05em;
    }

    .table tr:last-child td {
      border-bottom: none;
    }

    .table tr:hover {
      background-color: rgba(10, 43, 79, 0.05);
    }

    /* Status Links */
    .primary {
      display: inline-block;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-weight: 600;
      text-align: center;
      color: white;
      text-decoration: none;
      background-color: var(--primary);
    }

    .primary:hover {
      background-color: #08213c;
      transform: translateY(-1px);
    }

    /* Hide the table initially */
    #myTable {
      display: none;
    }

    /* Footer Styles */
    #main-footer {
      background-color: var(--dark);
      color: #fff;
      text-align: center;
      padding: 1.5rem;
      margin-top: auto;
    }

    /* Loading indicator */
    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(0, 0, 0, 0.1);
      border-radius: 50%;
      border-top-color: var(--primary);
      animation: spin 1s ease-in-out infinite;
      margin-left: 0.5rem;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .navbar {
        padding: 0 1rem;
        flex-wrap: wrap;
      }
      
      .navbar-brand {
        justify-content: center;
        width: 100%;
        margin-bottom: 0.5rem;
      }
      
      .navbar-nav {
        justify-content: center;
        width: 100%;
      }
      
      .page {
        padding: 1rem;
      }
      
      .table th, 
      .table td {
        padding: 0.75rem 0.5rem;
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar">
    <div class="navbar-brand">
      <img src="images/ui-logo.png" class="logo" alt="University Logo">
      <div class="topbar-divider"></div>
      <h1 class="app-title">Quality Assurance Application</h1>
      <img src="images/logo.png" class="logo" alt="QA Logo">
    </div>

    <ul class="navbar-nav">
      <li class="nav-item">
        <button class="logout" type="submit" name="logout">
          <a href="../Login/index.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </button>
      </li>
      <li class="nav-item">
        <button class="logout" type="submit" name="add-admin">
          <a href="../Admin/index.php"><i class="fas fa-user-plus"></i>Add Admin</a>
        </button>
      </li>
    </ul>
  </nav>

  <main class="page">
    <div class="question-holder">
      <h1 class="title">Welcome, Dear Administrator!</h1>
      <p class="subtitle">Please select a faculty and department to view lecturer reports</p>
    </div>

    <div class="contain">
      <div id="feechecker">
        <form id="selectionForm" method="post">
          <div class="form-group">
            <label for="faculty">Select Faculty:</label>
            <select class="form-control" name="faculty" id="faculty" onchange="showUser(this.value)" required>
              <option value="" selected disabled>Select Faculty</option>
              <?php
              // PHP code is preserved for server-side rendering
              while ($row2 = mysqli_fetch_assoc($result2)) {
              ?>
                <option value="<?php echo $row2['id']; ?>">
                  <?php echo $row2['faculty']; ?>
                </option>
              <?php
              }
              ?>
            </select>
          </div>
          <div id="txtHint"></div>
        </form>
      </div>

      <table class="table" id="myTable">
        <thead>
          <tr>
            <th>Lecturer</th>
            <th>Course Taken</th>
            <th>View Report</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <!-- Table data will be loaded here dynamically -->
        </tbody>
      </table>
    </div>
  </main>

  <footer id="main-footer">
    <p>Copyright &copy; The Postgraduate College, All Rights Reserved</p>
  </footer>

  <script>
    // JavaScript for AJAX functionality
    var xmlhttp;
    
    function showUser(str) {
      // Show loading indicator
      var faculty = document.getElementById('faculty');
      if (faculty.nextElementSibling && faculty.nextElementSibling.classList.contains('loading')) {
        faculty.nextElementSibling.remove();
      }
      
      var loading = document.createElement('div');
      loading.className = 'loading';
      faculty.parentNode.appendChild(loading);
      
      // Hide the table when changing faculty
      document.getElementById('myTable').style.display = 'none';
      
      xmlhttp = GetXmlHttpObject();
      if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
      }
      
      var url = "getfield.php";
      url = url + "?q=" + str;
      url = url + "&sid=" + Math.random();
      
      xmlhttp.onreadystatechange = stateChanged;
      xmlhttp.open("GET", url, true);
      xmlhttp.send(null);
    }
    
    function stateChanged() {
      if (xmlhttp.readyState == 4) {
        // Remove loading indicator
        var loading = document.querySelector('.loading');
        if (loading) {
          loading.remove();
        }
        
        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
        
        // Add event listener to the department select (which is dynamically added)
        setTimeout(function() {
          var departmentSelect = document.getElementById('department');
          if (departmentSelect) {
            departmentSelect.onchange = loadTableData;
            
            // Remove the submit button if it exists (added in getfield.php)
            var submitBtn = document.querySelector('input[name="submit"]');
            if (submitBtn) {
              submitBtn.parentNode.removeChild(submitBtn);
            }
          }
        }, 100);
      }
    }
    
    function GetXmlHttpObject() {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        return new XMLHttpRequest();
      }
      if (window.ActiveXObject) {
        // code for IE6, IE5
        return new ActiveXObject("Microsoft.XMLHTTP");
      }
      return null;
    }
    
    function loadTableData() {
      // Show loading indicator
      var department = document.getElementById('department');
      if (department.nextElementSibling && department.nextElementSibling.classList.contains('loading')) {
        department.nextElementSibling.remove();
      }
      
      var loading = document.createElement('div');
      loading.className = 'loading';
      department.parentNode.appendChild(loading);
      
      var faculty = document.getElementById('faculty').value;
      var department = document.getElementById('department').value;
      
      if (faculty && department) {
        // Use AJAX to load table data
        var xhr = GetXmlHttpObject();
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // Remove loading indicator
            var loadingElement = document.querySelector('.loading');
            if (loadingElement) {
              loadingElement.remove();
            }
            
            // Get the data and populate the table
            document.getElementById('tableBody').innerHTML = xhr.responseText;
            
            // Show the table with a fade-in effect
            var table = document.getElementById('myTable');
            table.style.display = 'table';
            table.style.opacity = 0;
            
            var opacity = 0;
            var interval = setInterval(function() {
              if (opacity < 1) {
                opacity += 0.1;
                table.style.opacity = opacity;
              } else {
                clearInterval(interval);
              }
            }, 30);
          }
        };
        
        // Create a URL for the AJAX request
        var url = "getLecturerData.php";
        url = url + "?faculty=" + faculty + "&department=" + department;
        xhr.open("GET", url, true);
        xhr.send();
      }
    }
    
    // Add custom styling to dynamically loaded elements
    document.addEventListener('DOMContentLoaded', function() {
      // This will apply styles to any elements added later through AJAX
      var style = document.createElement('style');
      style.textContent = `
        #department {
          display: block;
          width: 100%;
          padding: 0.75rem 1rem;
          font-size: 1rem;
          line-height: 1.5;
          color: #495057;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid #ced4da;
          border-radius: 0.5rem;
          transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          cursor: pointer;
          appearance: none;
          background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%230a2b4f' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
          background-repeat: no-repeat;
          background-position: right 1rem center;
          padding-right: 2.5rem;
          margin-bottom: 1.5rem;
        }
        
        #department:focus {
          border-color: var(--primary);
          outline: 0;
          box-shadow: 0 0 0 0.2rem rgba(10, 43, 79, 0.25);
        }
        
        a[style='background: red;'] {
          background-color: var(--danger) !important;
          display: inline-block;
          padding: 0.5rem 1rem;
          border-radius: 0.5rem;
          font-weight: 600;
          text-align: center;
          color: white;
          text-decoration: none;
        }
        
        a[style='background: orange;'] {
          background-color: var(--warning) !important;
          display: inline-block;
          padding: 0.5rem 1rem;
          border-radius: 0.5rem;
          font-weight: 600;
          text-align: center;
          color: white;
          text-decoration: none;
        }
      `;
      document.head.appendChild(style);
    });
  </script>
</body>
</html>