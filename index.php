<?php 
    session_start();
    include('dbconn.php');
    if(isset($_SESSION['verified_user_id'])){
        $_SESSION['status'] = "You Already Logged In !!";
        header('Location:home.php');
    }
    // $database->
    // $reference = $database->getReference('contact');
    // echo $reference->getValue();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome to Firebase User Auth</title>
</head>
<body>
            <?php 
                include 'includes/navigation.php';
            ?>
    <div class="header">
        <div class="main-title">
            <h2>Welcome to Firebase User Authentication</h2>
        </div>
        <div class="img-base">
            <img src="indeximg.png" alt="">
        </div>
    </div>
    
</body>
</html>