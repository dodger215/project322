<?php
require('../assets/function.php');

if (!isset($_SESSION['auth'])) {
    redirect('../loginpage.php', "Oops something went wrong");
}

// Retrieve questions data from wherever it's stored, e.g., a session or database
$questionsData = $_SESSION['questionsData'] ?? []; // example data source

?>
<!DOCTYPE html>
<html lang="en">
    <?php require('header/header.php'); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .main {
            padding: 20px;
            margin: 5px 0;
            display: flex;
            flex-direction: column;
        }

        .main h1 {
            font-weight: 600;
        }

        .main ol {
            display: flex;
            flex-direction: column;
            max-height: 70vh;
            overflow-y: scroll;
            margin: 5px 0;
        }

        .main ol li {
            display: flex;
            flex-direction: column;
            background-color: rgba(255, 166, 0, 0.4);
            padding: 20px 30px;
            border-radius: 10px;
            margin: 10px 0;
        }

        .main ol li:nth-child(even) {
            background-color: rgba(0, 190, 208, 0.3);
        }

        .main ol li .question {
            font-weight: 600;
        }

        .options {
            display: flex;
            flex-direction: column;
        }

        .options span {
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .btn {
            margin-top: 20px;
            padding: 10px 20px;
        }

        /* Results section */
        .results {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            display: none; /* Hidden by default */
        }

    </style>
</head>

<body>
    <a href="mainpage.php" class="btn btn-close">Close</a>
    <div class="main mt-5" id="generated">
        <h1 class="info">Generated Questions</h1>
        <div class="sub_1"></div>
        <ol class="main_q">
            <?php if (!empty($questionsData)) : ?>
                <?php foreach ($questionsData as $index => $question) : ?>
                    <li>
                        <span class="question"><?= htmlspecialchars($question['question']) ?></span>
                        <div class="options">
                            <span><input type="radio" name="q<?= $index ?>" value="option_A"> A. <?= htmlspecialchars($question['option_A']) ?></span>
                            <span><input type="radio" name="q<?= $index ?>" value="option_B"> B. <?= htmlspecialchars($question['option_B']) ?></span>
                            <span><input type="radio" name="q<?= $index ?>" value="option_C"> C. <?= htmlspecialchars($question['option_C']) ?></span>
                            <span><input type="radio" name="q<?= $index ?>" value="option_D"> D. <?= htmlspecialchars($question['option_D']) ?></span>
                        </div>
                        <input type="hidden" name="a<?= $index ?>" value="<?= htmlspecialchars($question['correct_answer']) ?>">
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No questions available.</p>
            <?php endif; ?>
        </ol>
        <div class="sub" style="display: flex; justify-content: space-between; margin: 10px 0;">
            <button onclick="submitAnswers()" class="btn btn-primary">Submit</button>
            <button onclick="exportPdf()" class="btn btn-secondary">Export</button>
        </div>
        <div class="results" id="resultsContainer">
            <h2>Quiz Results</h2>
            <p id="correctCount"></p>
            <p id="wrongCount"></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        function exportPdf() {
            const options = {
                margin: 0.5,
                filename: `Questions_${Math.random().toString().slice(2, 9)}.pdf`,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(document.querySelector('.main_q')).set(options).save();
        }

        function submitAnswers() {
            let correctCount = 0;
            let wrongCount = 0;

            const questions = document.querySelectorAll('.main_q li');

            questions.forEach((question, index) => {
                const selectedOption = document.querySelector(`input[name="q${index}"]:checked`);
                const correctAnswer = document.querySelector(`input[name="a${index}"]`).value;

                if (selectedOption) {
                    if (selectedOption.value === correctAnswer) {
                        correctCount++;
                    } else {
                        wrongCount++;
                    }
                } else {
                    wrongCount++;
                }
            });

            // Display results in the results section
            document.getElementById('correctCount').textContent = `Correct Answers: ${correctCount}`;
            document.getElementById('wrongCount').textContent = `Wrong Answers: ${wrongCount}`;
            document.getElementById('resultsContainer').style.display = 'block'; // Show results
        }
    </script>
</body>
</html>
