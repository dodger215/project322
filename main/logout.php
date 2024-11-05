<?php
 require('../assets/function.php');

 if (isset($_SESSION['auth'])) {
    logouSession();
    redirect('../loginpage.php', 'Log Out Successfuly');
 }

?>