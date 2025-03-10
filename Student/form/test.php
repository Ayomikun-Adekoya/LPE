<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $conn = new PDO("mysql:host=localhost;dbname=hder", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_POST['submit'])) {
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
        $stmt = $conn->prepare("INSERT INTO rate_new (numeration, course_code, enthusiasm, warmth, credibility, expectation, encoragement, professional, adaptability, knowledgeable, pedagogy, assessment, overall, comment) VALUES (:numeration, :code, :enthusiasm, :warmth, :credibility, :expectation, :encoragement, :professional, :adaptability, :knowledgeable, :pedagogy, :assessment, :overall, :comment)");
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

        if ($stmt->execute()) {
            header("Location: ../Dashboard/index.php?numeration=" . $numeration);
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .navbar {
            background: #fff;
            padding: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            height: 40px;
        }

        .navbar h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #03182e;
        }

        .logout {
            background: #dc3545;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .survey {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .question-holder {
            background: #fff;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .question-holder h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #03182e;
        }

        .question-holder .question {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .scores {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .score {
            display: flex;
            align-items: center;
        }

        .score input {
            display: none;
        }

        .score label {
            background: #f1f1f1;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .score input:checked + label {
            background: #0a2b4f;
            color: #fff;
        }

        textarea {
            width: 100%;
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            resize: vertical;
        }

        .submit-btn {
            background: #0a2b4f;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #03182e;
        }

        footer {
            background: #03182e;
            color: #fff;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div>
            <img src="images/ui-logo.png" alt="Logo" class="logo">
            <h1>Quality Assurance Application</h1>
        </div>
        <button class="logout">Logout</button>
    </nav>

    <main class="survey">
        <?php
        require_once("../classes/student.class.php");
        $numeration = $_GET['numeration'];
        $lecturer = $_GET['lecturer'];
        $student = new student($numeration);
        $name = $student->getName();
        echo '<h1 class="title">Rate ' . $lecturer . ' with the Teaching Effectiveness Scale Below</h1>';
        ?>

        <form method="POST" action="#">
            <!-- Enthusiasm -->
            <div class="question-holder">
                <h2>Enthusiasm</h2>
                <p class="question">Appears Confident and Friendly, Is active and demonstrative when teaching.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="enthusiasm" id="enthusiasm-poor" value="1">
                        <label for="enthusiasm-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="enthusiasm" id="enthusiasm-fair" value="2">
                        <label for="enthusiasm-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="enthusiasm" id="enthusiasm-good" value="3">
                        <label for="enthusiasm-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="enthusiasm" id="enthusiasm-veryGood" value="4">
                        <label for="enthusiasm-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="enthusiasm" id="enthusiasm-excellent" value="5">
                        <label for="enthusiasm-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Repeat for other questions -->
            <div class="question-holder">
        
        <h2 class="title">Warmth</h2>
        <p class="question">Smiles frequently,<br>Is approachable in and out of the lecture room.</p>

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

          <div class="question-holder">
      
        <h2 class="title">Credibility</h2>
        <p class="question">Is open <br> Honest and fair in his/her dealings with students openly solicits <br> Accepts students' comments and criticisms.</p>

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

          <div class="question-holder">

<h2 class="title">EXPECTATION FOR SUCCESS</h2>
<p class="question">Clearly informs students of the course objectives <br> Stimulates students' interest in the course <br> Calls all students often and equitably to respond in the class <br> Helps students modify incorrect or inadequate responses.</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">ENCOURAGING AND PATIENT</h2>
<p class="question">Is optimistic <br> Positive and cheerful <br> Is a good and active listener when students are speaking.</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">PROFESSIONAL</h2>
<p class="question">Treats the subject seriously and with passion <br> comes to class regularly and promptly <br> Maintains a professional image (appearance, comportment and mannerisms) <br> Is always fair but firm.</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">ADAPTABILITY</h2>
<p class="question">Is flexible in course activities when the need arises</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">KNOWLEDGEABLE</h2>
<p class="question">Has a good mastery of what he/she is teaching <br> Recommends relevant reading materials for the course and advises students on how to access them.</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">PEDAGOGY</h2>
<p class="question">Uses various instructional approaches (Enhanced lecture, Group, Question & Answer, Discussion, etc.) <br> Employs jokes and other creative means in lesson delivery <br> Employs instructional resources in lesson delivery (Multimedia, Real objectives,Technologies etc.)</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">ASSESSMENT OF STUDENTS</h2>
<p class="question">Gives regular assignments/ tests <br> Provides feedback on assignments/tests <br> Encourages students to successfully complete tasks.</p>

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
</            <div class="question-holder">
<div class="question-holder warmth">


<h2 class="title">OVERALL ASSESSMENT</h2>
<p class="question">In comparison to all other lecturers that have taught you in THIS University<br> How would you rate this lecturer?</p>

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

            <!-- Comment Section -->
            <div class="question-holder">
                <h2>Any Other Comment</h2>
                <textarea name="comment" id="comment" rows="4"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit" class="submit-btn">Submit</button>
        </form>
    </main>

    <footer>
        <p>Copyright &copy; The Postgraduate College, All Rights Reserved</p>
    </footer>
</body>
</html>