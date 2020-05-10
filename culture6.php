<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=pfe','root','root');


if (!isset($_SESSION['id'])) {
  $_SESSION['flash']['danger']="Pour accéder au exercices veuillez vous connecter";
  header('Location: index.php');
  exit();
}

$score = 0;

if(isset($_POST['submit'])){
  
if(isset($_POST['x1']) AND $_POST['x1'] == "2"){
  $score++;
}
if(isset($_POST['x2']) AND $_POST['x2'] == "3"){
  $score++;
}
if(isset($_POST['x3']) AND $_POST['x3'] == "4"){
  $score++;
}
if(isset($_POST['x4']) AND $_POST['x4'] == "2"){
  $score++;
}
if(isset($_POST['x5']) AND $_POST['x5'] == "2"){
  $score++;
}
if(isset($_POST['x6']) AND $_POST['x6'] == "4"){
  $score++;
}
if(isset($_POST['x7']) AND $_POST['x7'] == "1"){
  $score++;
}
if(isset($_POST['x8']) AND $_POST['x8'] == "1"){
  $score++;
}
if(isset($_POST['x9']) AND $_POST['x9'] == "4"){
  $score++;
}
if(isset($_POST['x10']) AND $_POST['x10'] == "2"){
  $score++;
}


$resultat = "Votre score est de ".$score." /10";
if($score == 10){
  $res_success = "Félécitations vous avez réussi le test ";
  $insert=$bdd->prepare("INSERT INTO test(id_user,num,etat) VALUES(?,?,?)");
  $delete=$bdd->prepare("DELETE FROM test WHERE etat=? AND id_user=? AND num=?");
  $insert->execute(array($_SESSION['id'],18,'Test Reussi'));
  $delete->execute(array('Test Pas Reussi',$_SESSION['id'],1));
  $_SESSION['flash']['success']=$res_success ." <br> ".$resultat;
}else{
  $res_fail = "EMM Dommage , vous pouvez réessayer ";
  $insert=$bdd->prepare("INSERT INTO test(id_user,num,etat) VALUES(?,?,?)");
  $insert->execute(array($_SESSION['id'],18,'Test Pas Reussi'));
  $delete=$bdd->prepare("DELETE FROM test WHERE etat=? AND id_user=? AND num=?");
  $delete->execute(['Test Reussi',$_SESSION['id'],1]);
  $_SESSION['flash']['danger']=$res_fail ." <br> ".$resultat;

}



}
 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Courses Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />

    <style>
    p,
    label {
        font: 1rem 'Fira Sans', sans-serif;
    }

    input {
        margin: .4rem;
    }


    </style>







</head>

<body>

    <?php if(isset($_SESSION['flash'])) : ?>

    <?php foreach($_SESSION['flash'] as $type => $message):?>
    <div class="aler alert-<?= $type ?>">
        <div style="font-family:Rubik,sans-serif;" class="pt-2 pb-2 lead text-align-center text-center border ">
            <?= $message ?> </div>
    </div>
    <?php  endforeach ?>

    <?php unset($_SESSION['flash']); ?>

    <?php endif ?>

    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
        <div class="main_menu">
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between" method="" action="">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here" />
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about-us.php">About</a>
                            </li>
                            <li class="nav-item submenu dropdown active">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="courses.php">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="course-details.php">Course Details</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <?php if(isset($_SESSION['id'])) : ?>
                                <a class="nav-link" href="deco.php">Log-out</a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link search" id="search">
                                    <i class="ti-search"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>Course Details</h2>
                            <div class="page_link">
                                <a href="home.php">Home</a>
                                <a href="courses.php">Courses</a>
                                <a href="course-details.php">Courses Details</a>
                                <a href="course-detail.php">Grammar</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap bg-light text-center">

        <h2> Test 2 </h2>

        <form method="POST">
            <br>
            <h4>Choose the correct response :</h4>
            <br>
            <img src="https://semelazic.files.wordpress.com/2019/03/jimmy-page-led-zeppelin-750x400.jpg" height="400" width="800">
            <br>
            <legend> #1 De quel groupe Jimmy Page était-il le leader ?</legend>
            <input type="radio" name="x1" value="1"> Pink Floyd <?php if(isset($_POST['x1']) AND $_POST['x1'] == "1"){
                
                            echo "<font color='red'>  x  </font>";} ?>
                            <br>

            <input type="radio" name="x1" value="2"> Led Zeppelin   <?php if(isset($_POST['x1']) AND $_POST['x1'] == "2"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
             <input type="radio" name="x1" value="3"> Deep purple <?php if(isset($_POST['x1']) AND $_POST['x1'] == "3"){
                           
                            echo "<font color='red'>  x  </font>"; 
                           } ?>
            <br>
             <input type="radio" name="x1" value="4"> Aerosmith <?php if(isset($_POST['x1']) AND $_POST['x1'] == "4"){
                           
                            echo "<font color='red'>  x  </font>"; 
                           } ?>
                           <br>
                           <br>

                           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSGza78VRfwUdnuxHrORzVhYfppvuNa1QXjoGX05B7RQTU_SXhi&usqp=CAU" width="800" height="400">
            <legend> #2 Par quelles initiales désigne-t-on l’Allemagne de l’Est jusqu’en 1990 ?</legend>
            <input type="radio" name="x2" value="1"> URSS <?php if(isset($_POST['x2']) AND $_POST['x2'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?>
<br>
            <input type="radio" name="x2" value="2"> RPC <?php if(isset($_POST['x2']) AND $_POST['x2'] == "2"){
                             echo "<font color='red'>  x  </font>"; } ?><br>
                            <input type="radio" name="x2" value="3"> RDA <?php if(isset($_POST['x2']) AND $_POST['x2'] == "3"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>
                            <input type="radio" name="x2" value="4"> RFA <?php if(isset($_POST['x2']) AND $_POST['x2'] == "4"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
            <br>

            <img src="https://resize-parismatch.lanmedia.fr/r/625,417,forcex,center-middle/img/var/news/storage/images/paris-match/royal-blog/royaume-uni/richard-iii-identifie-grace-a-son-adn-plus-de-500-ans-apres-sa-mort-1203302/20390645-1-fre-FR/Richard-III-identifie-grace-a-son-ADN-plus-de-500-ans-apres-sa-mort.jpg" width="800" height="400">
            <legend> #3 Dans quelle oeuvre de Shakespeare trouve-t-on la réplique : « Un cheval ! Un cheval ! Mon royaume pour un cheval ! »</legend>
            <input type="radio" name="x3" value="1"> Hamlet <?php if(isset($_POST['x3']) AND $_POST['x3'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
            <input type="radio" name="x3" value="2"> Le Roi Lear <?php if(isset($_POST['x3']) AND $_POST['x3'] == "2"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?> <br>
                           <input type="radio" name="x3" value="3"> Comme il vous plaira <?php if(isset($_POST['x3']) AND $_POST['x3'] == "3"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?> <br>
                           <input type="radio" name="x3" value="4"> Richard III <?php if(isset($_POST['x3']) AND $_POST['x3'] == "4"){
                            
                            echo "<font color='green'>  ✔  </font>";
                           } ?> <br>
            <br>
            <img src="https://media.routard.com/image/43/0/birmanie-bagan-2.1492430.w630.jpg" height="400" width="800">
            <legend>  #4 En 2011, quel pays initie une politique d’ouverture et de libéralisation après des années de régime de junte militaire ?</legend>
            <input type="radio" name="x4" value="1"> Cuba <?php if(isset($_POST['x4']) AND $_POST['x4'] == "1") {
                            echo "<font color='red'>  x  </font>"; } ?>
<br>
            <input type="radio" name="x4" value="2"> La Birmanie <?php if(isset($_POST['x4']) AND $_POST['x4'] == "2"){
                            
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
                           <input type="radio" name="x4" value="3"> La Syrie Negra   <?php if(isset($_POST['x4']) AND $_POST['x4'] == "3"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x4" value="4">  L'Iran  <?php if(isset($_POST['x4']) AND $_POST['x4'] == "4"){
                            
                            echo "<font color='red'>  x  </font>";
                           } ?><br>
            <br>
             <img src="https://www.aquaportail.com/pictures1505/futaie-hetres.jpg" width="800" height="400">
            <legend> #5 À quel autre animal ressemble le wallaby ?</legend>
            <input type="radio" name="x5" value="1"> Au Koala . <?php if(isset($_POST['x5']) AND $_POST['x5'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
            <input type="radio" name="x5" value="2"> Au Kangourou . <?php if(isset($_POST['x5']) AND $_POST['x5'] == "2") {
                            echo "<font color='green'>  ✔  </font>"; } ?>
            <br>
            <input type="radio" name="x5" value="3"> Au diable de Tasmanie . <?php if(isset($_POST['x5']) AND $_POST['x5'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <input type="radio" name="x5" value="4"> Au panda .<?php if(isset($_POST['x5']) AND $_POST['x5'] == "4"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <br>

            <img src="https://thetravelersclub.boardingarea.com/wp-content/uploads/2020/04/tokyo_4296_649687843.jpg" width="800" height="400">
            <legend> #6 « Voyage à Tokyo » est un film de …</legend>
            <input type="radio" name="x6" value="1"> Akira Kurosawa <?php if(isset($_POST['x6']) AND $_POST['x6'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
            <input type="radio" name="x6" value="2"> Kitano Takeshi <?php if(isset($_POST['x6']) AND $_POST['x6'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <input type="radio" name="x6" value="3"> Hayao Miyazaki <?php if(isset($_POST['x6']) AND $_POST['x6'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <input type="radio" name="x6" value="4"> Yasujiro Ozu <?php if(isset($_POST['x6']) AND $_POST['x6'] == "4"){
                            echo "<font color='green'>  ✔  </font>"; } ?>
            <br>
            <br>
            <img src="https://i.f1g.fr/media/eidos/493x178_crop/2019/06/19/XVM3642a50a-91d8-11e9-908c-e04cf7f68362.jpg" width="800" height="400">
            <legend> #7 De quel pays Salazar était-il le dictateur ?</legend>
            <input type="radio" name="x7" value="1"> Du Portugal <?php if(isset($_POST['x7']) AND $_POST['x7'] == "1"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>
            <input type="radio" name="x7" value="2"> Du Brésil <?php if(isset($_POST['x7']) AND $_POST['x7'] == "2"){
                            echo "<font color='red'>  x </font>"; } ?>
            <br>
            <input type="radio" name="x7" value="3"> De l'Espagne <?php if(isset($_POST['x7']) AND $_POST['x7'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <input type="radio" name="x7" value="4"> Du Pérou <?php if(isset($_POST['x7']) AND $_POST['x7'] == "4") {
                            echo "<font color='red'>  x  </font>";} ?>
            <br>
            <br>
<img src="https://www.lepointdufle.net/ia/orthographe1.jpg" width="800" height="400">
            <legend> #8 Complétez : « Lors de son intervention télévisée, le journaliste a mis le l’homme politique sur le … »</legend>
            <input type="radio" name="x8" value="1"> gril <?php if(isset($_POST['x8']) AND $_POST['x8'] == "1"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>
            <input type="radio" name="x8" value="2"> grile <?php if(isset($_POST['x8']) AND $_POST['x8'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <input type="radio" name="x8" value="3"> grill <?php if(isset($_POST['x8']) AND $_POST['x8'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <input type="radio" name="x8" value="4"> grille <?php if(isset($_POST['x8']) AND $_POST['x8'] == "4"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <br>
            <img src="https://cdn.radiofrance.fr/s3/cruiser-production/2019/09/927d76d9-1b74-4047-b5b8-e0fc2768f85d/838_primo_levi.jpg" width="800" height="400">
            <legend> #9 De quoi traite le livre « Si c’est un homme » de Primo Levi ?</legend>
            <input type="radio" name="x9" value="1"> De la fraternisation des camps ennemis pendant la Première Guerre mondiale. <?php if(isset($_POST['x9']) AND $_POST['x9'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
            <input type="radio" name="x9" value="2"> Des crimes de la révolution culturelle en Chine.<?php if(isset($_POST['x9']) AND $_POST['x9'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
             <input type="radio" name="x9" value="3"> Du goulag en URSS .  <?php if(isset($_POST['x9']) AND $_POST['x9'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
             <input type="radio" name="x9" value="4"> De la déportation des Juifs par les nazis.  <?php if(isset($_POST['x9']) AND $_POST['x9'] == "4"){
                            echo "<font color='green'>  ✔  </font>"; } ?>
            <br>
            <br>
            <img src="https://voyage.tv5monde.com/sites/default/files/egypte_croisiere_nil_luxor.jpg" width="800" height="400">
            <legend> #10 Quelle capitale se trouve au confluent du Nil blanc et du Nil bleu ?</legend>
            <input type="radio" name="x10" value="1"> Addis-Adeba <?php if(isset($_POST['x10']) AND $_POST['x10'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
            <input type="radio" name="x10" value="2"> Khartoum  <?php if(isset($_POST['x10']) AND $_POST['x10'] == "2"){
                            echo "<font color='green'>  ✔  </font>"; } ?>
            <br>
             <input type="radio" name="x10" value="3"> Le Caire  <?php if(isset($_POST['x10']) AND $_POST['x10'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
             <input type="radio" name="x10" value="4"> Mogadiscio   <?php if(isset($_POST['x10']) AND $_POST['x10'] == "4"){
                            echo "<font color='red'>  x  </font>"; } ?>
            <br>
            <br>
            <input class="btn btn-outline-dark pl-5 pr-5" type="submit" name="submit" value="Finish">

        </form>

    </section>
    <!--================ End Course Details Area =================-->

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Top Products</h4>
                    <ul>
                        <li><a href="#">Managed Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 single-footer-widget">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers,</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'"
                                required="" type="email" />
                            <button class="click-btn btn btn-default">
                                <span>subscribe</span>
                            </button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                    type="text" />
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter"></i></a>
                    <a href="#"><i class="ti-dribbble"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>