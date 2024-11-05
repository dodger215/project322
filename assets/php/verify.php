<?php

require('../function.php');

if(!isset($_SESSION['auth'])){
    redirect('../../signup.php', "Oops something went wrong");
}

$verify_id = $_SESSION['id'];


$confer = "";

if(isset($_POST['verify'])){
    $code = $_POST['code'];
    if($code == $verify_id){
        $confer = "Code match";
        redirect('../../loginpage.php', "Successfully");
    }else{
        $confer = "Code not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4-Digit Verification Code</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .verification-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .verification-box {
            display: flex;
            gap: 15px;
        }
        .verification-box input {
            width: 60px;
            height: 60px;
            text-align: center;
            font-size: 1.5rem;
            border-radius: 10px;
            border: 1px solid #ced4da;
        }
        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }
        .result {
            margin-top: 20px;
            font-size: 1.2rem;
        }
        .buttons {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container verification-container">
    <div>
    <div class="text-center result">code: <?= $verify_id?></div>
        <h3 class="text-center mb-4">Enter Verification Code</h3>
        <div class="verification-box">
            <input type="text" class="form-control" maxlength="1" id="digit1" oninput="moveToNext(this, 'digit2')" autofocus>
            <input type="text" class="form-control" maxlength="1" id="digit2" oninput="moveToNext(this, 'digit3')">
            <input type="text" class="form-control" maxlength="1" id="digit3" oninput="moveToNext(this, 'digit4')">
            <input type="text" class="form-control" maxlength="1" id="digit4" oninput="moveToNext(this, '')">
        </div>
        <div class="text-center buttons">
            <form method="POST">
                <input type="hidden" id="code" name="code">
                <input type="hidden" id="id" value="<?= $verify_id?>">
                <button type="submit" name="verify" class="btn btn-primary" onclick="verifyCode()">Verify</button>
                <button type="button" name="send" class="btn btn-secondary">Resend Code</button>
            </form>
            
        </div>
        <div class="text-center result"><?= $confer ?></div>
    </div>
</div>

<!-- Bootstrap JS (optional for certain interactive components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- EmailJS -->
<script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>

<script>
    // let randomCode;  // Global variable to store the random code

    // Initialize EmailJS
    (function() {
        emailjs.init("YOUR_USER_ID");
    })();

    function generateRandomCode(){
        const code = document.querySelector('#id').value;
        return code;
    }

    // Handle form submission and sending the email
    function sendEmail() {
        const email = "kelvinenosdzah2@gmail.com";
        randomCode = generateRandomCode();  // Generate and store the random code

        // Send the random code to the user's email using EmailJS
        emailjs.send("service_ja96rq7", "template_ht8lf91", {
            to_email: email,
            verification_code: randomCode
        })
        .then(function(response) {
            alert('Code sent successfully!');
        }, function(error) {
            alert('Failed to send code');
        });
    }

    // Function to move focus to the next input field
    function moveToNext(current, nextFieldID) {
        if (current.value.length >= 1 && nextFieldID) {
            document.getElementById(nextFieldID).focus();
        }
    }

    // Function to verify the input code
    function verifyCode() {
        const digit1 = document.getElementById('digit1').value;
        const digit2 = document.getElementById('digit2').value;
        const digit3 = document.getElementById('digit3').value;
        const digit4 = document.getElementById('digit4').value;

        // Combine the digits into a single code
        const enteredCode = digit1 + digit2 + digit3 + digit4;

        document.querySelector('#code').value =enteredCode;

        // Compare the entered code with the sent code
        // if (enteredCode == randomCode) {
        //     document.getElementById('result').innerText = "Verification successful!";
        //     document.getElementById('result').style.color = "green";
        // } else {
        //     document.getElementById('result').innerText = "Incorrect code. Please try again.";
        //     document.getElementById('result').style.color = "red";
        // }
    }

    // Function to reload the code and resend it via email
    function reloadCode() {
        // Regenerate and send a new random code
        sendEmail();
        document.getElementById('result').innerText = "A new code has been sent to your email.";
        document.getElementById('result').style.color = "blue";
    }
</script>

</body>
</html>
