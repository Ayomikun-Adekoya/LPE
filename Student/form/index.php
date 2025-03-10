<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teaching Effectiveness Rating Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .navbar {
            background: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar .logo {
            height: 50px;
        }

        .navbar h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #03182e;
            margin-left: 1rem;
        }

        .logout {
            background: #dc3545;
            color: #fff;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .logout:hover {
            background: #c82333;
        }

        .survey {
            padding: 2rem;
            max-width: 900px;
            margin: 2rem auto;
        }

        .survey-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .survey-title {
            font-size: 1.8rem;
            color: #03182e;
            margin-bottom: 1rem;
        }

        .survey-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        .question-holder {
            background: #fff;
            padding: 1.8rem;
            margin-bottom: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .question-holder:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        }

        .question-holder h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #03182e;
            display: flex;
            align-items: center;
        }

        .question-holder .question {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .scores {
            display: flex;
            gap: 0.8rem;
            justify-content: space-between;
        }

        .score {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .score input {
            display: none;
        }

        .score label {
            display: block;
            width: 100%;
            text-align: center;
            background: #f8f9fa;
            padding: 0.8rem 0.5rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid #e9ecef;
        }

        .score label:hover {
            background: #e9ecef;
        }

        .score input:checked + label {
            background: #0a2b4f;
            color: #fff;
            border-color: #0a2b4f;
            box-shadow: 0 3px 8px rgba(10, 43, 79, 0.3);
            transform: translateY(-2px);
        }

        textarea {
            width: 100%;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
            margin-bottom: 1rem;
            resize: vertical;
            min-height: 120px;
            font-family: 'Montserrat', sans-serif;
            transition: border 0.3s ease;
        }

        textarea:focus {
            outline: none;
            border-color: #0a2b4f;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .submit-btn {
            background: #0a2b4f;
            color: #fff;
            padding: 1rem 3rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(10, 43, 79, 0.2);
        }

        .submit-btn:hover {
            background: #03182e;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(10, 43, 79, 0.3);
        }

        footer {
            background: #03182e;
            color: #fff;
            text-align: center;
            padding: 1.5rem;
            margin-top: 3rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .navbar-left {
                margin-bottom: 1rem;
            }
            
            .scores {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .score label {
                padding: 0.6rem;
            }
            
            .survey {
                padding: 1rem;
            }
            
            .question-holder {
                padding: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="images/ui-logo.png" alt="University Logo" class="logo">
            <h1>Quality Assurance Application</h1>
        </div>
        <button class="logout">Logout</button>
    </nav>

    <main class="survey">
        <div class="survey-header">
            <h1 class="survey-title">Teaching Effectiveness Rating Scale</h1>
            <p class="survey-subtitle">Please rate your lecturer on the following criteria</p>
        </div>

        <form method="POST" action="#">
            <!-- Enthusiasm -->
            <div class="question-holder">
                <h2>1. Enthusiasm</h2>
                <p class="question">Appears confident and friendly. Is active and demonstrative when teaching.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="enthusiasm" id="enthusiasm-poor" value="1" required>
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

            <!-- Warmth -->
            <div class="question-holder">
                <h2>2. Warmth</h2>
                <p class="question">Smiles frequently. Is approachable in and out of the lecture room.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="warmth" id="warmth-poor" value="1" required>
                        <label for="warmth-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="warmth" id="warmth-fair" value="2">
                        <label for="warmth-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="warmth" id="warmth-good" value="3">
                        <label for="warmth-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="warmth" id="warmth-veryGood" value="4">
                        <label for="warmth-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="warmth" id="warmth-excellent" value="5">
                        <label for="warmth-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Credibility -->
            <div class="question-holder">
                <h2>3. Credibility</h2>
                <p class="question">Is open, honest and fair in his/her dealings with students. Openly solicits and accepts students' comments and criticisms.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="credibility" id="credibility-poor" value="1" required>
                        <label for="credibility-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="credibility" id="credibility-fair" value="2">
                        <label for="credibility-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="credibility" id="credibility-good" value="3">
                        <label for="credibility-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="credibility" id="credibility-veryGood" value="4">
                        <label for="credibility-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="credibility" id="credibility-excellent" value="5">
                        <label for="credibility-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Expectation for Success -->
            <div class="question-holder">
                <h2>4. Expectation for Success</h2>
                <p class="question">Clearly informs students of the course objectives. Stimulates students' interest in the course. Calls all students often and equitably to respond in the class. Helps students modify incorrect or inadequate responses.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="expectation" id="expectation-poor" value="1" required>
                        <label for="expectation-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="expectation" id="expectation-fair" value="2">
                        <label for="expectation-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="expectation" id="expectation-good" value="3">
                        <label for="expectation-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="expectation" id="expectation-veryGood" value="4">
                        <label for="expectation-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="expectation" id="expectation-excellent" value="5">
                        <label for="expectation-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Encouraging and Patient -->
            <div class="question-holder">
                <h2>5. Encouraging and Patient</h2>
                <p class="question">Is optimistic, positive and cheerful. Is a good and active listener when students are speaking.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="encoragement" id="encoragement-poor" value="1" required>
                        <label for="encoragement-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="encoragement" id="encoragement-fair" value="2">
                        <label for="encoragement-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="encoragement" id="encoragement-good" value="3">
                        <label for="encoragement-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="encoragement" id="encoragement-veryGood" value="4">
                        <label for="encoragement-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="encoragement" id="encoragement-excellent" value="5">
                        <label for="encoragement-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Professional -->
            <div class="question-holder">
                <h2>6. Professional</h2>
                <p class="question">Treats the subject seriously and with passion. Comes to class regularly and promptly. Maintains a professional image (appearance, comportment and mannerisms). Is always fair but firm.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="professional" id="professional-poor" value="1" required>
                        <label for="professional-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="professional" id="professional-fair" value="2">
                        <label for="professional-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="professional" id="professional-good" value="3">
                        <label for="professional-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="professional" id="professional-veryGood" value="4">
                        <label for="professional-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="professional" id="professional-excellent" value="5">
                        <label for="professional-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Adaptability -->
            <div class="question-holder">
                <h2>7. Adaptability</h2>
                <p class="question">Is flexible in course activities when the need arises.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="adaptability" id="adaptability-poor" value="1" required>
                        <label for="adaptability-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="adaptability" id="adaptability-fair" value="2">
                        <label for="adaptability-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="adaptability" id="adaptability-good" value="3">
                        <label for="adaptability-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="adaptability" id="adaptability-veryGood" value="4">
                        <label for="adaptability-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="adaptability" id="adaptability-excellent" value="5">
                        <label for="adaptability-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Knowledgeable -->
            <div class="question-holder">
                <h2>8. Knowledgeable</h2>
                <p class="question">Has a good mastery of what he/she is teaching. Recommends relevant reading materials for the course and advises students on how to access them.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="knowledgeable" id="knowledgeable-poor" value="1" required>
                        <label for="knowledgeable-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="knowledgeable" id="knowledgeable-fair" value="2">
                        <label for="knowledgeable-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="knowledgeable" id="knowledgeable-good" value="3">
                        <label for="knowledgeable-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="knowledgeable" id="knowledgeable-veryGood" value="4">
                        <label for="knowledgeable-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="knowledgeable" id="knowledgeable-excellent" value="5">
                        <label for="knowledgeable-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Pedagogy -->
            <div class="question-holder">
                <h2>9. Pedagogy</h2>
                <p class="question">Uses various instructional approaches (Enhanced lecture, Group, Question & Answer, Discussion, etc.). Employs jokes and other creative means in lesson delivery. Employs instructional resources in lesson delivery (Multimedia, Real objectives, Technologies etc.)</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="pedagogy" id="pedagogy-poor" value="1" required>
                        <label for="pedagogy-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="pedagogy" id="pedagogy-fair" value="2">
                        <label for="pedagogy-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="pedagogy" id="pedagogy-good" value="3">
                        <label for="pedagogy-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="pedagogy" id="pedagogy-veryGood" value="4">
                        <label for="pedagogy-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="pedagogy" id="pedagogy-excellent" value="5">
                        <label for="pedagogy-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Assessment of Students -->
            <div class="question-holder">
                <h2>10. Assessment of Students</h2>
                <p class="question">Gives regular assignments/tests. Provides feedback on assignments/tests. Encourages students to successfully complete tasks.</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="assessment" id="assessment-poor" value="1" required>
                        <label for="assessment-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="assessment" id="assessment-fair" value="2">
                        <label for="assessment-fair">Fair</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="assessment" id="assessment-good" value="3">
                        <label for="assessment-good">Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="assessment" id="assessment-veryGood" value="4">
                        <label for="assessment-veryGood">Very Good</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="assessment" id="assessment-excellent" value="5">
                        <label for="assessment-excellent">Excellent</label>
                    </div>
                </div>
            </div>

            <!-- Overall Assessment -->
            <div class="question-holder">
                <h2>11. Overall Assessment</h2>
                <p class="question">In comparison to all other lecturers that have taught you in THIS University, how would you rate this lecturer?</p>
                <div class="scores">
                    <div class="score">
                        <input type="radio" name="overall" id="overall-poor" value="1" required>
                        <label for="overall-poor">Poor</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="overall" id="overall-fair" value="2">
                        <label for="overall-fair">Below Average</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="overall" id="overall-good" value="3">
                        <label for="overall-good">Average</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="overall" id="overall-veryGood" value="4">
                        <label for="overall-veryGood">Above Average</label>
                    </div>
                    <div class="score">
                        <input type="radio" name="overall" id="overall-excellent" value="5">
                        <label for="overall-excellent">Outstanding</label>
                    </div>
                </div>
            </div>

            <!-- Comment Section -->
            <div class="question-holder">
                <h2>12. Any Other Comments</h2>
                <p class="question">Please provide any additional feedback or suggestions for the lecturer.</p>
                <textarea name="comment" id="comment" rows="5" placeholder="Your comments here..."></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" name="submit" class="submit-btn">Submit Evaluation</button>
            </div>
        </form>
    </main>

    <footer>
        <p>Copyright &copy; 2025 The Postgraduate College. All Rights Reserved.</p>
    </footer>
</body>
</html>