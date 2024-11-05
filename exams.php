<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exams</title>
    <link rel="stylesheet" href="exam-style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="exam-header">
            <h1>EXAMS AREA. WHAT DO YOU THINK</h1>
            <div class="timer">
                <span>Time Left:</span>
                <span id="time">00:59:00</span> <!-- Timer Placeholder -->
            </div>
        </div>
    </header>

    <!-- Main Exam Content -->
    <section class="exam-container">
        <div class="question-container">
            <h2>Question 1</h2>
            <p>Which one of you celebrated the Yam Festival (without YAM)?</p>
            <form id="examForm">
                <div class="options">
                    <label>
                        <input type="radio" name="question1" value="a"> A. ABRAHAM a.k.a A.B
                    </label>
                    <label>
                        <input type="radio" name="question1" value="b"> B. FELICITY a.k.a SNAPCHAT 
                    </label>
                    <label>
                        <input type="radio" name="question1" value="c"> C. LIBERTY a.k.a T 4 HEIGHT 
                    </label>
                    <label>
                        <input type="radio" name="question1" value="d"> D. DESMOND a.k.a BREAD PRODUCER
                    </label>
		  <label>
                        <input type="radio" name="question1" value="d"> E. KELVIN a.k.a DOUGHNUT LOVER
                    </label>	
                </div>
            </form>
        </div>

        <!-- Navigation Buttons -->
        <div class="exam-navigation">
            <button class="btn-prev">Previous</button>
            <button class="btn-next">Next</button>
        </div>

        <!-- Submit Button -->
        <div class="submit-section">
            <button class="btn-submit">Submit Exam</button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>THIS IS A TEMPLATE FOR THE EXAMS END</p>
    </footer>

    <!-- JavaScript for the Timer -->
    <script src="exam-script.js"></script>
</body>
</html>
