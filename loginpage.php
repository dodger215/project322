<?php

session_start();

if(!isset($_SESSION['status'])){
    $display = "Log in";
}else{
    $display = $_SESSION['status'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
    
    .result {
        margin-top: 20px;
        font-size: 1.2rem;
        padding: 12px;
        background: rgba(200, 12, 190, 0.2);
        border: solid 2px rgba(200, 12, 190, 0.1);
        border-radius: 5px;
        font-weight: 600;
        color: #000000af;
    }


.dialog {
    display: none; /* Hidden by default */
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

.dialog.active {
    display: flex; /* Show dialog when active */
    animation: fadeIn 0.3s; /* Animation for showing */
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM5ABWnQ2Ns7Cr30vg+Fj6pgYQ4n5TZL5JBIUib" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <section class="auth-container d-flex align-items-center justify-content-center" style="display: flex;
     flex-direction: column;  min-height: 100vh; background-color: #f8f9fa;">

<div class="dialog error">
            <div class="container" style="padding: 20px 10px; width: 70%; background-color: #ffffff; border-radius: 10px; display: flex; flex-direction: column; align-items: center; justify-content: space-between;">
                <span class="icon" style="color: #faa96c; font-weight: 600; opacity: 60%; margin: 10px 0; font-size: 4em;"><i class="fas fa-info-circle"></i></span>
                <span class="show_error" style="color: #faa96c; font-weight: 600; opacity: 60%; margin: 10px 0;"><?= $display?></span>     
                <button class="btn btn-danger disable" style="margin: 10px 0;">close</button>
            </div>       
        </div>


        <div class="auth-box bg-white p-5 rounded shadow-sm" style="max-width: 400px; width: 100%; margin: 10px 0;">
            <h2 class="text-center mb-4">Login</h2>
            <form id="login-form" method="POST" action="assets/php/confirm.php"> 
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background: #faa96c; border: none;">Login</button>
                <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign up here</a></p>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>

(function(e){

    document.querySelector('.dialog').classList.add('active');
} ());





document.querySelector('.disable').addEventListener('click', () => {
    document.querySelector('.show_error').innerHTML="";
    document.querySelector('.dialog').classList.remove('active');
});

    </script>
</body>
</html>
