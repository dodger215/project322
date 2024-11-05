<?php 

session_start();

// if(!isset($_SESSION['status'])){
//     $display = "Register";
// }else{
//     $display = $_SESSION['status'];
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
     
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <section class="auth-container d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa; display: flex;
     flex-direction: column;">
    
        <!-- <h2><?= $display?></h2> -->
        <div class="auth-box bg-white p-5 rounded shadow-sm" style="max-width: 400px; width: 100%; margin: 10px 0;">
            <h2 class="text-center mb-4">Sign Up</h2>
            <form id="signup-form" method="POST" action="assets/php/register.php">  
                <div class="mb-3">
                    <label for="fname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fname" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="submit" style="background: #faa96c; border: none;">Sign Up</button>
                <p class="text-center mt-3">Already have an account? <a href="loginpage.php">Login here</a></p>
            </form>
        </div>
    </section>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
