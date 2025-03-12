<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lecturer</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script>
        function showForm() {
            document.getElementById('lecturerForm').style.display = 'block';
        }
    </script>
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            width: 50px;
        }

        .navbar h1 {
            font-size: 1.5rem;
            color: #03182e;
        }

        .logout {
            background: #dc3545;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        main {
            flex: 1;
            padding: 2rem;
            text-align: center;
        }

        .table-container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #03182e;
            color: #fff;
        }

        .btn-add {
            background: green;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            padding: 1rem;
            background: #03182e;
            color: #ccc;
        }

        #lecturerForm {
            display: none;
            margin-top: 20px;
            padding: 1rem;
            background: #fff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div>
            <img src="images/ui-logo.png" class="logo" alt="Logo">
            <h1>Quality Assurance Application</h1>
        </div>
        <div>
            <a href="../Dashboard/index.php?department=<?php echo urlencode($_GET['id']); ?>" class="logout">Return</a>
            <a href="../Login/index.php" class="logout">Logout</a>
        </div>
    </nav>

    <main>
        <div class="table-container">
            <h1>Departmental Lecturers</h1>
            <table>
                <tr>
                    <th>Lecturers</th>
                    <th>Delete</th>
                </tr>
                <?php
                    require_once("../classes/department.class.php");
                    require_once("../classes/lecturer.class.php");
                    $id = $_GET['id'];
                    $department = new department($id);
                    $lecturers = $department->getdepartmentalLecturers();
                    foreach ($lecturers as $value) {
                        $lecture = new lecturer($value);
                        echo "<tr><td>{$lecture->getName()}</td><td><a href='delete_lecturer.php?lecturer=$value&id=$id' class='logout'>Delete</a></td></tr>";
                    }
                ?>
            </table>
            <button class="btn-add" onclick="showForm()">Add Lecturer</button>

            <div id="lecturerForm">
                <h3>Enter Lecturer Information</h3>
                <form action="#" method="post">
                    <label for="lecturerName">Lecturer Name:</label>
                    <input type="text" id="lecturerName" name="lecturerName" required>
                    <button type="submit" class="btn-add">Submit</button>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; The Postgraduate College, All Rights Reserved</p>
    </footer>
</body>
</html>
