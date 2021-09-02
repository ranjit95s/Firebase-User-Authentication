<?php 
    session_start();
    if(isset($_SESSION['verified_user_id'])){
        $_SESSION['status'] = "You Already Logged In !!";
        header('Location:../home.php');
        exit();
    }
    // include('../dbconn.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
    <title>Sign In Yourself</title>
</head>
<body>
    <div class="container">
        <h5>Sign In</h5>
        <div class="outer-sign-up">
            <div class="form">
            <?php 
            
            if(isset($_SESSION['status'])){
                echo '<div class="msg">';
                echo "<h2>".$_SESSION['status']."</h2>";
                    echo '<div class="close" id="msg-close"> <i class="fa fa-close"></i> </div>';
                echo '</div>';
                    unset($_SESSION['status']);
                }
            
            ?>
                <form action="../logincode.php" method="post">
                    <ul>
                        <li><i class="fa fa-at"></i>
                        <input type="email" name="email" id="" placeholder="Enter your email"></li>
                        <li><i class="fa fa-lock" style="margin-right:9px;"></i>
                        <input type="password" name="pass" id="" placeholder="Enter your password"></li>
                        <li style="font-weight: 700; font-size:1rem !important;"> Forgot Password?<span style="color: #2424ce; cursor: pointer;"> <a href="sendEmail.php" style="color: #2424ce; cursor: pointer; text-decoration:none;">Reset Password</a></span> </li>
                        <li style="text-align: center;">
						<input type="submit" class="clickSignUp" name="signin" Value="Sign In">
						</li>
                        <br>
						<li style="font-weight: 700; font-size:1.2rem !important; text-align:center;"> Not have an account? <span> <a href="sign-up.php" style="color: #2424ce; cursor: pointer; text-decoration:none;">Sign Up</a> </span> </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
	$('#msg-close').click(function(){
			var loginForm = $('.msg').hide('slow');
		});
</script>
</html>