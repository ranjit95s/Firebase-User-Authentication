<?php 

    session_start();
    include('dbconn.php');


    if(isset($_POST['signup'])){
        $fullname = $_POST['fullname'];
        $email    = $_POST['email'];
        $password = $_POST['pass'];

        // echo " <script> console.log( 'fullname is' + ' $fullname ' + 'email is' + ' $email ' + 'password is' + ' $password' ); </script> ";

        $userProperties = [
            'email' => $email ,
            'emailVerified' => false,
            'password' => $password,
            'displayName' => $fullname,
        ];
        try {
            $createdUser = $auth->createUser($userProperties);
            if($createdUser){
                $_SESSION['status'] = "Account created login with email and password !!!!!";
                header('Location:includes/sign-in.php');
            }else{
                $_SESSION['status'] = "not created !!!!!";
                header('Location:includes/sign-up.php');
            }
        } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e){
            $_SESSION['status'] = "email or password is wrong";
            header('Location:includes/sign-up.php');
        }  catch (\Kreait\Firebase\Exception\InvalidArgumentException $e){
            $_SESSION['status'] = 'Please enter email , password filed properly';
            header('Location:includes/sign-up.php');
        }
      
    
    }

    if(isset($_POST['reset'])){

        $emails    = $_POST['email'];

        try {
            // $user = $auth->getUser('some-uid');
            $user = $auth->getUserByEmail($emails);
            // $user = $auth->getUserByPhoneNumber('+49-123-456789');
            $_SESSION['status'] = "found user ... now send email !!";
            header('Location:includes/sendEmail.php');
            $link = $auth->sendPasswordResetLink($emails);

            if($link){
            $_SESSION['status'] = "check email indox!!!!!";
            header('Location:includes/sign-in.php');
            }else{
            $_SESSION['status'] = "check email inbox!!!!!";
            header('Location:includes/sign-in.php');
            }

        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            echo $e->getMessage();
                        $_SESSION['status'] = "no user found on this email!!!!!";
                        header('Location:includes/sign-in.php');
        } 

        // $link = $auth->getEmailVerificationLink($email);

      
        //     $_SESSION['status'] = "sended!!!!!";
        //     header('Location:includes/sign-in.php');
      
    
    }

?>