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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
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
    <?php 
            
            if(isset($_SESSION['status'])){
                echo '<div class="msg">';
                echo "<h2>".$_SESSION['status']."</h2>";
                    echo '<div class="close" id="msg-close"> <i class="fa fa-close"></i> </div>';
                echo '</div>';
                    unset($_SESSION['status']);
                }
            
            ?>
        <div class="img-base">
            <img src="indeximg.png" alt="">
        </div>
    </div>
    
</body>
<script>
	$('#msg-close').click(function(){
			var loginForm = $('.msg').hide('slow');
		});
</script>
</html>