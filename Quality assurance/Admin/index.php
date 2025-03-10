<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Admin</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <script>
        function showForm() {
            document.getElementById('lecturerForm').style.display = 'block';
        }
    </script>
</head>
<style>
#lecturerForm {
            display: none;
            margin-top: 20px;
        }
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

  * {
    box-sizing: border-box;
  }

  body {
    font-family: "Montserrat", sans-serif;
    margin: 0 !important;
    background: #f9f9f9 !important;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  html{
    height: 100%;
    margin: 0;
  }

  .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

  .small-image {
    width: 70px;
    /* Set desired width */
    height: auto;
    /* Maintain aspect ratio */
  }

  .logo_placement {
    padding-left: 5%;
    padding-top: 5%;
  }

  #navchecker {
    background: #fff;
    display: flex;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    justify-content: center;
    align-items: center;
    text-align: center;
  }

  #navchecker .h3 {
    color: #03182e;
    line-height: 1.7rem;
    font-weight: 400;
    font-family: "Lato", Arial, sans-serif;
  }

  .mr {
    margin-right: 1rem;
  }

  .ml {
    margin-left: 1rem;
  }

  #main-footer .footer {
    display: flex;
    justify-content: space-around;
    text-align: left;
  }

  #main-footer .footer h1 {
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 3rem;
  }

  #main-footer {
    text-align: center;
    padding: 1.5rem;
    color: #ccc;
  }

  .bg-d {
    background: #03182e;
  }

  input[type=text],
  input[type=password] {
    padding-left: 2rem !important;
    margin-bottom: 0.5rem;
    border-radius: 1rem !important;
    outline: none;
    border: 1px solid #0a2b4f !important;
    background-color: #fff !important;
  }

  .btn-primary {
    border-radius: 1rem !important;
    outline: none;
    border: 1px solid #0a2b4f !important;
    background-color: #0a2b4f !important;
    cursor: pointer;
  }

  .btn-primary:hover {
    border: 1px solid #0a2b4f !important;
    background-color: #fff !important;
    color: #0a2b4f;
  }

  .question-holder {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    margin-bottom: 2rem;
    background-color: white;
    font-weight: 500;
    border-radius: 16px;
    box-shadow: 4px 4px 10px -2px rgba(3, 24, 46, 0.2);
    color: rgb(38, 38, 38)
  }

  .title {
    margin: 0;
    font-size: 2rem;
    margin-bottom: 4px;
    color: rgb(38, 38, 38)
  }

  .head-title {
    text-align: center;
    margin-bottom: 1rem;
  }

  .head-li-title {
    text-align: center;
    margin-bottom: 1rem;
  }

  .prompt {
    display: grid;
    grid-auto-flow: column;
    margin: 8px 0;
  }

  .question {
    color: rgb(38, 38, 38);
    align-self: center;
    font-weight: 500;
    padding-right: 32px;
  }

  .scores {
    display: grid;
    grid-auto-columns: auto;
    grid-auto-rows: 2.5rem;
    grid-gap: 0.75rem;
    grid-auto-flow: column;
    justify-content: end;
  }

  .score {
    display: grid;
    grid-template-areas: 'hh';
  }

  .score input {
    grid-area: hh;
    opacity: 0;
    cursor: pointer;
  }

  .score:hover input~.check {
    background-color: rgb(212, 212, 212);
  }

  .score input:checked~.check {
    background-color: #0a2b4f !important;
    color: #fff;
  }

  .check {
    display: grid;
    grid-area: hh;
    background-color: rgba(232, 232, 232, 0.632);
    justify-content: center;
    align-content: center;
    padding: 0 8px;
    border-radius: 8px;
  }

  .title {
    align-self: center;
    justify-self: center;
    font-size: 1.5rem;
    font-weight: 600;
  }

  .submit {
    width: 300px;
    justify-self: center;
    margin: 8px;
    padding: 16px;
    font-family: Montserrat;
    font-weight: 700;
    color: white;
    font-size: 1rem;
    background-color: rgb(4, 142, 255);
    border-style: none;
    border-radius: 32px;
  }

  .survey {
    padding: 2.5rem 2rem;
  }

  .navbar {
    display: flex;
    justify-content: space-around;
    height: 4rem;
    width: 100% !important;
    background: #fff;
    position: static !important;
  }

  .shadow {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
  }

  .navbar ul li {
    list-style: none !important;
  }

  .navbar #nav1 h1 {
    font-weight: 400;
    line-height: 1.25;
  }

  .logout {
    background: #dc3545;
    padding: 0.5rem;
    margin-right: 10px;
    border-radius: 5px;
    display: flex;
    align-self: center;
    border: #dc3545;
    color: #fff;
    cursor: pointer;
  }

  .navbar #nav1 {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .logo {
    height: 2rem;
  }

  #comment {
    width: 100%;
    height: 10rem;
    border-radius: 1rem;
    padding: 1rem;
    outline: none !important;
    font-size: 1.5rem;
    border: 1px solid #03182e !important;
  }

  .form-group {
    display: flex !important;
    justify-content: center !important;
    align-self: center;
  }

  .table th {
    text-align: left !important;
    background: #0a2b4f;
    color: #fff;
    font-weight: 500 !important;
  }

  .table td {
    text-align: center !important;
    vertical-align: baseline !important;
  }

  .table th:first-child {
    border-top-left-radius: 10px;
  }

  .table th:last-child {
    border-top-right-radius: 10px;
  }

  .table tr:hover {
    background-color: #01314852;
    color: #000;
  }

  .table td,
  .table th {
    padding: .75rem;
    vertical-align: top;
  }

  .cmt {
    display: flex;
    justify-content: center;
  }

  .warning {
    padding: 0.2rem 1rem;
    background: #f6c23e;
    border: none;
    border-radius: 5px;
    color: #fff;
  }

  .table a {
    text-decoration: none;
    color: #fff;
    font-weight: bolder;
  }

  .warning:hover {
    background: #1cc88a;
  }

  a {
    text-decoration: none;
  }
</style>

<body>
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <div style="padding-left: 30%;" id="nav1" onmouseover="closeCity(event, 'Paris')">
      <img style="width: 50px;" src="images/ui-logo.png" class="logo">
      <div class="topbar-divider d-none d-sm-block"></div>
      <h1 class="h3 m-0 font-weight-100 text-primary">Quality Assurance Application</h1>
      <img style="width: 40px; margin-right:1rem;margin-bottom:0.3rem;" src="images/logo.png" class="logo">
    </div>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow" style="display: flex; align-items: center;">
        <button class="trash logout" type="submit" name="logout" style="margin-right: 10px;">
          <a href="../Dashboard/index.php"><i class="fas fa-sign-out-alt">Return</i></a>
        </button>
        <button class="trash logout" type="submit" name="logout">
          <a href="../Login/index.php"><i class="fas fa-sign-out-alt">Logout</i></a>
        </button>
      </li>
    </ul>
  </nav>

  <main class="page">
    <div class="survey">
      <div class="contain">
        <h1 class="title head-li-title">Create New User</h1>
        <form action="#" method="POST" style="text-align: center;">
          <label class="label">Username</label>
          <input class="form-control btn btn-primary submit px-3" type="text" name="username" placeholder="Username" required>
          <br><br>
          <label class="label">Password</label>
          <input class="form-control btn btn-primary submit px-3" type="password" name="password" placeholder="Password" required>
          <br><br>
          <input class="form-control btn btn-primary submit px-3" type="submit" value="Create User">
        </form>
        <br>
      </div>
    </div>
  </main>

  <footer id="main-footer" class="bg-d">
    <p>Copyright &copy;The Postgraduate College, All Rights Reserved</p>
  </footer>
</body>
</html>

<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "hder");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO quality_admin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../Dashboard/index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
