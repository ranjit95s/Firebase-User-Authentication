<?php 

    session_start();

    unset($_SESSION['verified_user_id']);
    unset($_SESSION['idTokenString']);

    $_SESSION['status'] = "Logged Out !!!!!";
    header('Location:index.php');
    exit();


?>