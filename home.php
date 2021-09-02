<?php 

include('Authentication.php');

include('dbconn.php');
try {
    $user = $auth->getUser($_SESSION['verified_user_id']);
    
} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    echo $e->getMessage();
    echo '<h1>Problem</h1>';
}

// echo $users; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>

    <title>Hello User</title>
</head>
<body>
            <?php 
                include 'includes/navigation.php';
            ?>
    <section id="user">
    <div class="container">
        <h1>User details :</h1>
        
        
            <?php 
            
            if(isset($_SESSION['status'])){
                echo '<div class="msg">';
                echo "<h2>".$_SESSION['status']."</h2>";
                    echo '<div class="close" id="msg-close"> <i class="fa fa-close"></i> </div>';
                echo '</div>';
                    unset($_SESSION['status']);
                }
            
            ?>
        

        <div class="inner-con">
        <div style="text-align:center;" id="profileImage"></div>
            <div class="user-details">
                <h2 id="firstName"><?= $user->displayName; ?></h2>
                <h3><?= $user->email; ?></h3>
                <h3><?= $user->uid; ?></h3>
            </div>
        </div>
    </div>
    </section>

</body>
<script>
	$('#msg-close').click(function(){
			var loginForm = $('.msg').hide('slow');
		});



$(document).ready(function(){
  var firstName = $('#firstName').text();
  var intials = $('#firstName').text().charAt(0);
  var profileImage = $('#profileImage').text(intials);
});
</script>
</html>