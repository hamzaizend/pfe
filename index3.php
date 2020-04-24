<?php
session_start();



$bdd = new PDO('mysql:host=localhost;dbname=pfe','root','root');

if(isset($_POST['signin'])){

    $name=htmlspecialchars($_POST['name']);
    $email=htmlspecialchars($_POST['email']);
    $password=sha1($_POST['password']);

if(!empty($name) AND !empty($email) AND !empty($password)){
     $requser = $bdd->prepare("SELECT * FROM membre WHERE name=? AND email=? AND password=?");
     $requser->execute(array($name,$email,$password));
     $userexist = $requser->rowCount();
     if($userexist == 1){

        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['email'] = $userinfo['email'];
        $_SESSION['name'] = $userinfo['name'];

        header('location:home.php?id='.$_SESSION['id']);

     }
     else{
        $erreur1 =" Mauvais mail ou Mot de passe ";
     }

}else{

    $erreur1 = "* Tous les champs doivent être complétés";
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts2/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>

<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_mail"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Your e-mail"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                         
                            </div>
                            <br/>
                            <?php if(isset($erreur1)){
                        echo '<font color="red" >'.$erreur1.'</font>';
                    } ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <script src="js2/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>