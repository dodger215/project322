<?php  

require('../function.php');

$fname = validate($conn, $_POST['name']);
$password = validate($conn, $_POST['password']);
$email = validate($conn, $_POST['email']);


if((!empty($fname)) && (!empty($email)) && (!empty($password))){
    $password_encrypted = encryption($conn, $password);
    $unique_id = uniqueId($conn, $fname);
    $id = rand(1000, 9999);

    $user_exit = mysqli_query($conn, "SELECT * FROM user WHERE full_name = '{$fname}'");
    if($user_exit){
        if(mysqli_num_rows($user_exit) > 0){
            redirect('../../signup.php', "User already exist");
        }else{
            $sql = "INSERT INTO user (unique_id, full_name, email, password) VALUE 
            ('{$unique_id}', '{$fname}', '{$email}', '{$password_encrypted}')";

            $query = mysqli_query($conn, $sql);
            if($query){
                $_SESSION['id'] = $id;
                redirect('../../loginpage.php', "Your has been created sucessfully. Log into your account");

            }else{
                redirect('../../signup.php', "Failed to create your account");    
            }  
        }
    }
}else{
    redirect('../../signup.php', "Field Empty");
}


?>