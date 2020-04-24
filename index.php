<?php

$bdd = new PDO('mysql:host=localhost;dbname=pfe','root','root');

if(isset($_POST['signup'])){
    

        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $pass = sha1($_POST['pass']);
        $re_pass = sha1($_POST['re_pass']);

    if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['pass']) AND !empty($_POST['re_pass']))
    {
        if(isset($_POST['agree-term'])){

       $reqmail = $bdd->prepare("SELECT * FROM membre WHERE email=?");
       $reqmail->execute(array($email));
       $exist=$reqmail->rowCount();

       if($exist == 0){

        
        if($pass == $re_pass){
    

          $insertmbr = $bdd->prepare("INSERT INTO membre(name,email,password,repassword) VALUES(?,?,?,?)");
          $insertmbr->execute(array($name,$email,$pass,$re_pass));

          $erreur = " Votre inscription a bien été effectuée ";


        
    }
    else {
        $erreur = " Mots de passes non identiques ";
    }


    }
    else{
        $erreur =" Mail dèja utilisée ";
    }
}else{

    $erreur =" * Veuillez accepter les conditions ";
}

    
    } else {
        $erreur = " * Tous les champs doivent être complétés ";

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

    

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php if(isset($name)){
                                    echo $name;
                                } ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your e-mail" value="<?php if(isset($email)){
                                    echo $email;
                                } ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label><br/>

                                <?php if(isset($erreur)){
                        echo '<font color="red" >'.$erreur.'</font>';
                    } ?>
                            </div>
                            <div class="form-group form-button">
                               <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#login-form" class="signup-image-link">I am already member</a>
                    </div>

                </div>
            
        </section>



    <!-- JS -->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <script src="js2/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
include('index3.php');
?>