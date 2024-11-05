<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QWABS - Demo Display</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 70px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        section h1 {
            text-align: center;
            margin: 2rem 0;
        }

        .question {
            margin-bottom: 2rem;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Header and Navigation -->
    <header class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand" href="index.html">QWABS - Demo Display</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="features.html">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.html">Signup</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <section class="container mt-5">
        <h1>Questions Generated</h1>
        <form method="GET" class="get">
            <!-- Question 1 -->
            <div class="question">
                <h2>Q1. What is Water?</h2>
                <div class="radio-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="optionA" value="A">
                        <label class="form-check-label" for="optionA">A. H<sub>2</sub>O</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="optionB" value="B">
                        <label class="form-check-label" for="optionB">B. C<sub>2</sub>B</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="optionC" value="C">
                        <label class="form-check-label" for="optionC">C. OH<sub>2</sub>COOOOH</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question1" id="optionD" value="D">
                        <label class="form-check-label" for="optionD">D. H<sub>2</sub>Cl</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2024 QWABS. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="javaScript/function.js"></script>
</body>
</html>
