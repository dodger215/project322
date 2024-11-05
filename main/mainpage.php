<?php
require('../assets/function.php');

if (!isset($_SESSION['auth'])) {
    redirect('../loginpage.php', "Oops something went wrong");
}

$sql = "SELECT * FROM user WHERE unique_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['auth']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('header/header.php'); ?>
    <style>

body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            background-color: #d6e1b656;
        }

    
        .main {
            padding: 20px;
            margin: 5px 0;
            background-color: none;
            display: flex;
            flex-direction: column;
        }

        .main h1 {
            font-weight: 600;
        }

        .main .get {
            display: flex;
            flex-direction: column;
        }

        .main ol {
            display: flex;
            flex-direction: column;
            max-height: 70vh;
            overflow-y: scroll;
            margin: 5px 0;
        }

        .flow {
            width: 100%;
            position: fixed;
            margin-bottom: 10px;
        }

        .flow div {
            background-color: greenyellow;
            height: 5px;
            border-radius: 10px;
            transform: scaleX(0);
            transform-origin: left;
            animation: scroll-progress ease-in-out;
            animation-timeline: scroll();
        }

        

        .main ol li {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            background-color: rgba(255, 166, 0, 0.4);
            width: 100%;
            padding: 20px 30px;
            border-radius: 10px;
            color: #000000;
            margin: 10px 0;
        }

        .main ol li:nth-child(even) {
            background-color: rgba(0, 190, 208, 0.3);
        }

        .main ol li .question {
            font-weight: 600;
        }

        .main ol li .options {
            display: flex;
            flex-direction: column;
        }

        /* Radio button styles */
        .options span {
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        /* Button style */
        button.btn {
            margin-top: 20px;
            padding: 10px 20px;
        }

        #intro, .intro {
            color: #333;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1.5s forwards;
            transition: transform 0.6s;
        }

        /* Animation timing for each text */
        #intro {
            font-size: 2.5rem;
            font-weight: bold;
            animation-delay: 0.5s;
        }

        h4.intro {
            font-size: 1.2rem;
            font-weight: normal;
            animation-delay: 1s;
            color: #555;
        }

        /* Keyframes for fade-in animation */
        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Flip effect on hover */
        #intro:hover, h4.intro:hover {
            transform: rotateY(180deg); /* 3D flip on hover */
        }
        @keyframes backgroundAnimation {
            0% {
                background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            }
            50% {
                background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            }
            100% {
                background: linear-gradient(135deg, #d4fc79, #96e6a1);
            }
        }

        .setTime {
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7); /* Dark overlay */
    z-index: 1001;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px); /* Blurred background */
    animation: fadeIn 0.3s; /* Animation for showing */
}


.setTime.active {
    display: flex; /* Show dialog when active */
    animation: fadeIn 0.3s; /* Animation for showing */
}
    </style>
</head>
<body>
    <div class="hamburger"><i class="fas fa-bars"></i></div>
    <div class="back-btn" style="display:none;"><i class="fas fa-arrow-left"></i></div>

    <nav>
        <div class="profile">
            <span class="profile_btn"></span>
            <div class="pop_menu">
                <span><?= htmlspecialchars($row['full_name']); ?></span>
            </div>
        </div>
        <div class="top">
            <a href="home.html" class="active">
                <i class="fas fa-home"></i>
                <span>HOME</span>
            </a>
            <a href="history.html">
                <i class="fas fa-history"></i>
                <span>HISTORY</span>
            </a>
        </div>
        <div class="button">
            <a href="about.html">
                <i class="fas fa-info-circle"></i>
                <span>ABOUT US</span>
            </a>
            <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>LOGOUT</span>
            </a>
        </div>
    </nav>

    <div class="load">
    <div class="dialog-content">
        <div class="container1">
            <div class="half"></div>
            <div class="half"></div>
        </div>
    </div>
</div>

    <section>
        <h1 id="intro" class="intro">HEY THERE, <?= htmlspecialchars($row['full_name']); ?></h1>
        <h4 class="intro" style="color: #faa96c;">Are you ready to explore your skills and test yourself with new challenges?</h4>
        <div class="content main_content" style="width: 100%; display: flex; justify-content: space-between; align-items: center; flex-direction: column;">
            <div class="container mt-5">
            <div class="container mt-5 d-flex flex-column align-items-center">
                <h5 class=" mb-4" style="color: #000;">Upload Your PDF</h5>
                <form id="pdfForm" class="w-100" style="max-width: 400px; display: flex; flex-direction: column;">
                    <div class="form-group text-center">
                        <label for="pdfFile" class="btn btn-outline-secondary btn-lg btn-block" style="border: solid 2px #faa96c">
                            <input type="file"  id="pdfFile" accept="application/pdf" class="d-none">
                            <span class="show" style="color: #faa96c;">Select your pdf file</span>
                        </label>
                        <small class="form-text text-muted">Only PDF files are accepted</small>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg btn-block" style="background: #faa96c; border: none;" onclick="uploadPdf()">Upload PDF</button>
                </form>
            </div>
        </div>
        

        <div class="dialog error">
            <div class="container" style="padding: 20px 10px; width: 70%; background-color: #ffffff; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: space-between;">
                <span class="sign" style="color: rgba(150, 5, 10, 0.8); font-size: 3.5em; font-weight: 600; padding: 0 25px; border-radius: 50px; border: solid 2px rgba(150, 5, 10, 0.8);">&times;</span>
                <h5 class="show_error" style="text-align: center; color: blue; font-weight: 600; opacity: 60%; margin: 10px 0;"></h5>     
                <button class="btn btn-danger disable">close</button>
            </div>       
        </div>
     
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="header/script/main_script.js"></script>
</body>
</html>
