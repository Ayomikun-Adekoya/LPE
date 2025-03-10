<?php
session_start();
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Establish a PDO connection
    $conn = new PDO("mysql:host=localhost;dbname=hder", "root", "");
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
} 

if (isset($_POST['submit'])) {
    // Sanitize and validate input data
    $numeration = htmlspecialchars($_GET['numeration'], ENT_QUOTES, 'UTF-8');
    $code = htmlspecialchars($_GET['code'], ENT_QUOTES, 'UTF-8');
    $enthusiasm = filter_input(INPUT_POST, 'enthusiasm', FILTER_SANITIZE_NUMBER_INT);
    $warmth = filter_input(INPUT_POST, 'warmth', FILTER_SANITIZE_NUMBER_INT);
    $credibility = filter_input(INPUT_POST, 'credibility', FILTER_SANITIZE_NUMBER_INT);
    $expectation = filter_input(INPUT_POST, 'expectation', FILTER_SANITIZE_NUMBER_INT);
    $encoragement = filter_input(INPUT_POST, 'encoragement', FILTER_SANITIZE_NUMBER_INT);
    $professional = filter_input(INPUT_POST, 'professional', FILTER_SANITIZE_NUMBER_INT);
    $adaptability = filter_input(INPUT_POST, 'adaptability', FILTER_SANITIZE_NUMBER_INT);
    $knowledgeable = filter_input(INPUT_POST, 'knowledgeable', FILTER_SANITIZE_NUMBER_INT);
    $pedagogy = filter_input(INPUT_POST, 'pedagogy', FILTER_SANITIZE_NUMBER_INT);
    $assessment = filter_input(INPUT_POST, 'assessment', FILTER_SANITIZE_NUMBER_INT);
    $overall = filter_input(INPUT_POST, 'overall', FILTER_SANITIZE_NUMBER_INT);
    $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
  
    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO rate_new (numeration, course_code, enthusiasm, warmth, credibility, expectation, encoragement, professional, adaptability, knowledgeable, pedagogy, assessment, overall, comment) VALUES (:numeration, :code, :enthusiasm, :warmth, :credibility, :expectation, :encoragement, :professional, :adaptability, :knowledgeable, :pedagogy, :assessment, :overall, :comment)");

        // Bind parameters
        $stmt->bindParam(':numeration', $numeration, PDO::PARAM_STR);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->bindParam(':enthusiasm', $enthusiasm, PDO::PARAM_INT);
        $stmt->bindParam(':warmth', $warmth, PDO::PARAM_INT);
        $stmt->bindParam(':credibility', $credibility, PDO::PARAM_INT);
        $stmt->bindParam(':expectation', $expectation, PDO::PARAM_INT);
        $stmt->bindParam(':encoragement', $encoragement, PDO::PARAM_INT);
        $stmt->bindParam(':professional', $professional, PDO::PARAM_INT);
        $stmt->bindParam(':adaptability', $adaptability, PDO::PARAM_INT);
        $stmt->bindParam(':knowledgeable', $knowledgeable, PDO::PARAM_INT);
        $stmt->bindParam(':pedagogy', $pedagogy, PDO::PARAM_INT);
        $stmt->bindParam(':assessment', $assessment, PDO::PARAM_INT);
        $stmt->bindParam(':overall', $overall, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

        // Execute the statement
        if ($stmt->execute()) {
          header("Location: ../Dashboard/index.php?numeration=" .$numeration);
          exit();  
        } 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // Close the connection
    $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Page</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

</head>
<style>

  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
*{
  box-sizing: border-box;

}
  body {
    font-family: "Montserrat", sans-serif;
    margin: 0 !important;
    background: #f9f9f9 !important;
  }
  
		    .small-image {
        width: 70px; /* Set desired width */
        height: auto; /* Maintain aspect ratio */}

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
		#navchecker .h3{
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
		#main-footer .footer{
    display: flex;
    justify-content: space-around;
    text-align: left;
}

#main-footer .footer h1{
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 3rem;
}

#main-footer{
  text-align: center;
  padding: 1.5rem;
  color: #ccc;
}
.bg-d{
  background: #03182e;
}

input[type=text],input[type=password] {
            padding-left: 2rem !important;
            margin-bottom: 0.5rem;
            border-radius: 1rem !important;
            outline: none;
            border: 1px solid #0a2b4f !important;
			background-color: #fff !important;



        }
		.btn-primary{
			
            border-radius: 1rem !important;
            outline: none;
            border: 1px solid #0a2b4f !important;
			background-color: #0a2b4f !important;
      cursor: pointer;
		}
		.btn-primary:hover{
			
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
.head-title{
  text-align: center;
  margin-bottom: 2rem;
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
 .navbar{
  display: flex;
  justify-content: space-around;
  height: 4rem;
  width: 100% !important;
  background: #fff;
 }
 .shadow {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
}

 .navbar ul li{
  list-style: none !important;  
 }
 .navbar #nav1 h1{
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

 .navbar #nav1{
  display: flex;
  justify-content: center;
  align-items: center;
  
 }
 .logo {
    height: 2rem;
    
}
#comment{
  width: 100%;
  height: 10rem;
  border-radius: 1rem;
  padding: 1rem;
  outline: none !important;;
  font-size: 1.5rem;
  border: 1px solid #03182e !important;
}
.form-group{
  display: flex !important;
  justify-content: center !important;;
  align-self: center;
}
</style>

<body>
<!-- <nav id="navchecker">
			<div class="mr">
				<img style="width:50px" src="images/ui-logo.png" class="logo">
			</div>
	
			<div>
				<h1 class="h3 m-0 font-weight-100" style="">University of Ibadan,<br>The&nbsp;Postgraduate&nbsp;College</h1>
	
			</div>
			<div class="ml">
				<img style="width:50px" src="images/logo.png" class="logo">
			</div>
	
		</nav> -->

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<div id="nav1" onmouseover="closeCity(event, 'Paris')">

    <!--
<div class="top-logo">

<img style="width: 30px;" src="img/ui-logo.png" class="logo">

</div>
-->
    <img style="width: 30px;" src="images/ui-logo.png" class="logo">
    <div class="topbar-divider d-none d-sm-block"></div>
    <img style="width: 40px; margin-right:1rem;margin-bottom:0.3rem; " src="images/logo.png" class="logo">
    <h1 class="h3 m-0 font-weight-100 text-primary">Quality Assurance Application</h1>
    <!--
<div class="top-logo">

<img style="width: 50px;" src="img/logo.png" class="logo">

</div>
-->
</div>
<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">


    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
    
            <button class="trash logout" type="submit" name="logout">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
    

    </li>

</ul>

</nav>
  <main class="page">
    <div class="survey">
     <?php
     
     require_once("../classes/student.class.php");
     $numeration = $_GET['numeration'];
     $lecturer = $_GET['lecturer'];
     $student = new student($numeration);
     $name = $student->getName();
     echo '<h1 class="title head-title">Rate '.$lecturer.' with the Teaching Effectiveness Scale Below</h1>'
     ?> 
      
      
      <form method="POST" action="#" class= "">
      
      <div class="question-holder enthusiasm">

        <div class="left">
          <h2 class="title">Enthusiasm</h2>
          <span class="question">Appears Confident and Friendly,<br>Is active and demonstrative when teaching.</span>
  
        </div>
        <div class="prompt left">
          <div class="scores">
            <div class="score">
              <input name="enthusiasm" id="Enthusiasm-poor" type="radio" value="1" />
              <label class="check" for="Enthusiasm-poor">Poor</label>
            </div>
            <div class="score">
              <input name="enthusiasm" id="Enthusiasm-fair" type="radio" value="2"/>
              <label class="check" for="Enthusiasm-fair" >Fair</label>
            </div>
            <div class="score">
              <input name="enthusiasm" id="Enthusiasm-good" type="radio" value="3"/>
              <label class="check" for="Enthusiasm-good" >Good</label>
            </div>
            <div class="score">
              <input name="enthusiasm" id="Enthusiasm-veryGood" type="radio" value="4"/>
              <label class="check" for="Enthusiasm-veryGood" >Very Good</label>
            </div>
            <div class="score">
              <input name="enthusiasm" id="Enthusiasm-excellent" type="radio" value="5" />
              <label class="check" for="Enthusiasm-excellent" >Excellent</label>
            </div>
          </div>
  
        </div>
      </div>
      <div class="question-holder warmth">

        <div class="left">
          <h2 class="title">Warmth</h2>
          <span class="question">Smiles frequently,<br>Is approachable in and out of the lecture room.</span>
  
        </div>
  
        <div class="prompt left">
          <div class="scores">
            <div class="score">
              <input name="warmth" id="warmth-poor" type="radio" value="1"/>
              <label class="check" for="warmth-poor">Poor</label>
            </div>
            <div class="score">
              <input name="warmth" id="warmth-fair" type="radio" value="2" />
              <label class="check" for="warmth-fair" >Fair</label>
            </div>
            <div class="score">
              <input name="warmth" id="warmth-good" type="radio" value="3"/>
              <label class="check" for="warmth-good" >Good</label>
            </div>
            <div class="score">
              <input name="warmth" id="warmth-veryGood" type="radio" value="4"/>
              <label class="check" for="warmth-veryGood" >Very Good</label>
            </div>
            <div class="score">
              <input name="warmth" type="radio" id="warmth-excellent" value="5"/>
              <label class="check" for="warmth-excellent" >Excellent</label>
            </div>
          </div>
  
        </div>
      </div>

      <div class="question-holder credibility">

        <div class="left">
          <h2 class="title">Credibility</h2>
          <span class="question">Is open <br> Honest and fair in his/her dealings with students openly solicits <br> Accepts students' comments and criticisms.</span>
  
        </div>
  
        <div class="prompt left">
          <div class="scores">
            <div class="score">
              <input name="credibility" id="credibility-poor" type="radio" value="1"/>
              <label class="check" for="credibility-poor">Poor</label>
            </div>
            <div class="score">
              <input name="credibility" id="credibility-poor" type="radio" value="2" />
              <label class="check" for="credibility-fair" >Fair</label>
            </div>
            <div class="score">
              <input name="credibility" id="credibility-good" type="radio" value="3"/>
              <label class="check" for="credibility-good" >Good</label>
            </div>
            <div class="score">
              <input name="credibility" id="credibility-veryGood" type="radio" value="4"/>
              <label class="check" for="credibility-veryGood" >Very Good</label>
            </div>
            <div class="score">
              <input name="credibility" id="credibility-excellent" type="radio" value="5" />
              <label class="check" for="credibility-excellent" >Excellent</label>
            </div>
          </div>
  
        </div>
      </div>

      <div class="question-holder warmth">

<div class="left">
  <h2 class="title">EXPECTATION FOR SUCCESS</h2>
  <span class="question">Clearly informs students of the course objectives <br> Stimulates students' interest in the course <br> Calls all students often and equitably to respond in the class <br> Helps students modify incorrect or inadequate responses.</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="expectation" id="expectation-poor" type="radio" value="1"/>
      <label class="check" for="expectation-poor">Poor</label>
    </div>
    <div class="score">
      <input name="expectation" id="expectation-fair" type="radio" value="2" />
      <label class="check" for="expectation-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="expectation" id="expectation-good" type="radio" value="3"/>
      <label class="check" for="expectation-good" >Good</label>
    </div>
    <div class="score">
      <input name="expectation" id="expectation-veryGood" type="radio" value="4"/>
      <label class="check" for="expectation-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="expectation" type="radio" id="expectation-excellent" value="5"/>
      <label class="check" for="expectation-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">ENCOURAGING AND PATIENT</h2>
  <span class="question">Is optimistic <br> Positive and cheerful <br> Is a good and active listener when students are speaking.</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="encoragement" id="encoragement-poor" type="radio" value="1"/>
      <label class="check" for="encoragement-poor">Poor</label>
    </div>
    <div class="score">
      <input name="encoragement" id="encoragement-fair" type="radio" value="2" />
      <label class="check" for="encoragement-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="encoragement" id="encoragement-good" type="radio" value="3"/>
      <label class="check" for="encoragement-good" >Good</label>
    </div>
    <div class="score">
      <input name="encoragement" id="encoragement-veryGood" type="radio" value="4"/>
      <label class="check" for="encoragement-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="encoragement" id="encoragement-excellent" type="radio" value="5"/>
      <label class="check" for="encoragement-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">PROFESSIONAL</h2>
  <span class="question">Treats the subject seriously and with passion <br> comes to class regularly and promptly <br> Maintains a professional image (appearance, comportment and mannerisms) <br> Is always fair but firm.</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="professional" id="professional-poor" type="radio" value="1"/>
      <label class="check" for="professional-poor">Poor</label>
    </div>
    <div class="score">
      <input name="professional" id="professional-fair" type="radio" value="2" />
      <label class="check" for="professional-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="professional" id="professional-good" type="radio" value="3"/>
      <label class="check" for="professional-good" >Good</label>
    </div>
    <div class="score">
      <input name="professional" id="professional-veryGood" type="radio" value="4"/>
      <label class="check" for="professional-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="professional" type="radio" id="professional-excellent" value="5"/>
      <label class="check" for="professional-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">ADAPTABILITY</h2>
  <span class="question">Is flexible in course activities when the need arises</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="adaptability" id="adaptability-poor" type="radio" value="1"/>
      <label class="check" for="adaptability-poor">Poor</label>
    </div>
    <div class="score">
      <input name="adaptability" id="adaptability-fair" type="radio" value="2" />
      <label class="check" for="warmth-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="adaptability" id="adaptability-good" type="radio" value="3"/>
      <label class="check" for="adaptability-good" >Good</label>
    </div>
    <div class="score">
      <input name="adaptability" id="adaptability-veryGood" type="radio" value="4"/>
      <label class="check" for="adaptability-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="adaptability" type="radio" id="adaptability-excellent" value="5"/>
      <label class="check" for="adaptability-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">KNOWLEDGEABLE</h2>
  <span class="question">Has a good mastery of what he/she is teaching <br> Recommends relevant reading materials for the course and advises students on how to access them.</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="knowledgeable" id="knowledgeable-poor" type="radio" value="1"/>
      <label class="check" for="knowledgeable-poor">Poor</label>
    </div>
    <div class="score">
      <input name="knowledgeable" id="knowledgeable-fair" type="radio" value="2" />
      <label class="check" for="warmth-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="knowledgeable" id="knowledgeable-good" type="radio" value="3"/>
      <label class="check" for="knowledgeable-good" >Good</label>
    </div>
    <div class="score">
      <input name="knowledgeable" id="knowledgeable-veryGood" type="radio" value="4"/>
      <label class="check" for="knowledgeable-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="knowledgeable" type="radio" id="knowledgeable-excellent" value="5"/>
      <label class="check" for="knowledgeable-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">PEDAGOGY</h2>
  <span class="question">Uses various instructional approaches (Enhanced lecture, Group, Question & Answer, Discussion, etc.) <br> Employs jokes and other creative means in lesson delivery <br> Employs instructional resources in lesson delivery (Multimedia, Real objectives,Technologies etc.)</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="pedagogy" id="pedagogy-poor" type="radio" value="1"/>
      <label class="check" for="pedagogy-poor">Poor</label>
    </div>
    <div class="score">
      <input name="pedagogy" id="pedagogy-fair" type="radio" value="2" />
      <label class="check" for="pedagogy-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="pedagogy" id="pedagogy-good" type="radio" value="3"/>
      <label class="check" for="pedagogy-good" >Good</label>
    </div>
    <div class="score">
      <input name="pedagogy" id="pedagogy-veryGood" type="radio" value="4"/>
      <label class="check" for="pedagogy-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="pedagogy" type="radio" id="pedagogy-excellent" value="5"/>
      <label class="check" for="pedagogy-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">ASSESSMENT OF STUDENTS</h2>
  <span class="question">Gives regular assignments/ tests <br> Provides feedback on assignments/tests <br> Encourages students to successfully complete tasks.</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="assessment" id="assessment-poor" type="radio" value="1"/>
      <label class="check" for="assessment-poor">Poor</label>
    </div>
    <div class="score">
      <input name="assessment" id="assessment-fair" type="radio" value="2" />
      <label class="check" for="assessment-fair" >Fair</label>
    </div>
    <div class="score">
      <input name="assessment" id="assessment-good" type="radio" value="3"/>
      <label class="check" for="assessment-good" >Good</label>
    </div>
    <div class="score">
      <input name="assessment" id="assessment-veryGood" type="radio" value="4"/>
      <label class="check" for="assessment-veryGood" >Very Good</label>
    </div>
    <div class="score">
      <input name="assessment" type="radio" id="assessment-excellent" value="5"/>
      <label class="check" for="assessment-excellent" >Excellent</label>
    </div>
  </div>

</div>
</div>

<div class="question-holder warmth">

<div class="left">
  <h2 class="title">OVERALL ASSESSMENT</h2>
  <span class="question">In comparison to all other lecturers that have taught you in THIS University<br> How would you rate this lecturer?</span>

</div>

<div class="prompt left">
  <div class="scores">
    <div class="score">
      <input name="overall" id="overall-poor" type="radio" value="1"/>
      <label class="check" for="overall-poor">Poor</label>
    </div>
    <div class="score">
      <input name="overall" id="overall-fair" type="radio" value="2" />
      <label class="check" for="overall-fair" >Below Average</label>
    </div>
    <div class="score">
      <input name="overall" id="overall-good" type="radio" value="3"/>
      <label class="check" for="overall-good" >Average</label>
    </div>
    <div class="score">
      <input name="overall" id="overall-veryGood" type="radio" value="4"/>
      <label class="check" for="overall-veryGood" >Above Average</label>
    </div>
    <div class="score">
      <input name="overall" type="radio" id="overall-excellent" value="5"/>
      <label class="check" for="overall-excellent" >Outstanding</label>
    </div>
  </div>

</div>
</div>


        <!-- Add prompts for other questions -->
        <h2 class="title">Any Other Comment</h2>
        <textarea name="comment" id="comment"></textarea>

        <div class="form-group">
		            	<input type="submit" name="submit" value="Submit" class="form-control btn btn-primary submit px-3">
		            </div>
      </form>

      <!-- Add more Question components as necessary -->
    </div>
  </main>
  <footer id="main-footer" class="bg-d">

        <p>Copyright &copy;The Postgraduate College, All Rights Reserved</p>
    </footer>
</body>
</form>
</html>

