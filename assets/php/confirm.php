<?php  

require('../function.php');

$password = validate($conn, $_POST['password']);
$email = validate($conn, $_POST['email']);


if((!empty($email)) && (!empty($password))){
    $password_encrypted = encryption($conn, $password);

    $check = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}' AND password = '{$password_encrypted}' LIMIT 1");
    if($check){
        if(mysqli_num_rows($check) == 1){
            $data = mysqli_fetch_array($check, MYSQLI_ASSOC);
            $_SESSION['auth'] = $data['unique_id'];
            $_SESSION['loggedInUser'] = [
                'name' => $data['full_name'],
                'email' => $data['email']
            ];
            redirect('../../main/mainpage.php', "Successfully");
        }else{
            redirect('../../loginpage.php', "Incorrect input try again");
        }
    }
}else{
    redirect('../../loginpage.php', "Field Empty");
}


?>