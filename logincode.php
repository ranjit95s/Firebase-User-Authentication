<?php 

    session_start();
    include('dbconn.php');

    if(isset($_POST['signin'])){
        $email    = $_POST['email'];
        $clearTextPassword = $_POST['pass'];

        // echo " <script> console.log('email is' + ' $email ' + 'password is' + ' $password' ); </script> ";
        // header('Location:../home.php');

        try {
            $user = $auth->getUserByEmail("$email");
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
            $idTokenString = $signInResult->idToken();

            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');

                $_SESSION['verified_user_id'] = $uid;
                $_SESSION['idTokenString'] = $idTokenString;

                $_SESSION['status'] = "Login !!!!!";
                header('Location:home.php');
                exit();

            } catch (InvalidToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            } catch (\InvalidArgumentException $e) {
                echo 'The token could not be parsed: '.$e->getMessage();
            }

        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            // echo $e->getMessage();
            $_SESSION['status'] = "not Found email !!!!!";
            header('Location:includes/sign-in.php');
            exit();
        } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e){
            $_SESSION['status'] = "email or password is wrong";
            header('Location:includes/sign-in.php');
        }  catch (\Kreait\Firebase\Exception\InvalidArgumentException $e){
            $_SESSION['status'] = 'Please enter email , password filed properly';
            header('Location:includes/sign-in.php');
        }

    }

?>