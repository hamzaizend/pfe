<?php
session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['flash']['danger']="Pour accéder au exercices veuillez vous connecter";
    header('Location: index.php');
    exit();
}



include "connexion.inc.php";


$requete= $bdd->prepare('SELECT id FROM test WHERE id_user=? and num=? and etat=?');
$requete->execute(array($_SESSION['id'],1,'Test Reussi'));
$ok=$requete->rowCount();
if($ok){
    $_SESSION['flash']['danger']="Vous avez déja réussi ce test vous pouvez passé au cours suivant";
    header('Location: course-details-grammar.php');
    exit();
}

    $score = 0;
    if(isset($_POST['submit'])){
    if(isset($_POST['c1']) AND $_POST['c1'] == "1"){
    $score++;
    }
    if(isset($_POST['h1']) AND $_POST['h1'] == "1"){
    $score++;
    }
    if(isset($_POST['o1']) AND $_POST['o1'] == "2"){
    $score++;
    }
    if(isset($_POST['i1']) AND $_POST['i1'] == "2" ){
    $score++;
    }
    if(isset($_POST['x1']) AND $_POST['x1'] == "2"){
    $score++;
    }
    if(isset($_POST['a1']) AND $_POST['a1'] == "2"){
    $score++;
    }
    if(isset($_POST['b1']) AND $_POST['b1'] == "1"){
    $score++;
    }
    if(isset($_POST['b2']) AND $_POST['b2'] == "1"){
    $score++;
    }

    $resultat = "Votre score est de ".$score." /8";

    if($score == 8){
    $res_success = "Félécitations vous avez réussi le test ";
    $insert=$bdd->prepare("INSERT INTO test(id_user,num,etat) VALUES(?,?,?)");
    $delete=$bdd->prepare("DELETE FROM test WHERE etat=? AND id_user=? AND num=?");
    $insert->execute(array($_SESSION['id'],1,'Test Reussi'));
    $delete->execute(array('Test Pas Reussi',$_SESSION['id'],1));
    $_SESSION['flash']['success']=$res_success ." <br> ".$resultat;
    header('Location: course-details-grammar.php');
    exit();
    }else{
        $res_fail = "EMM Dommage , vous pouvez réessayer ";
          $find=$bdd->prepare("SELECT id FROM test WHERE id_user=? AND num=? AND etat=?");
          $find->execute(array($_SESSION['id'],1,'Test Pas Reussi'));
          $ok=$find->rowCount();
        if(!$ok){ 
          $insert=$bdd->prepare("INSERT INTO test(id_user,num,etat) VALUES(?,?,?)");
          $insert->execute(array($_SESSION['id'],1,'Test Pas Reussi'));
          $_SESSION['flash']['danger']=$res_fail ." <br> ".$resultat;
        }
        else{
        $updatereq=$bdd->prepare("UPDATE test SET etat = Test Pas Reussi WHERE id_user=? and num=? ");
        $updatereq->execute(array($_SESSION['id'],1));
        $_SESSION['flash']['danger']=$res_fail ." <br> ".$resultat;
        }
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <div style="font-family:Rubik,sans-serif;" class="pt-2 pb-2 lead text-align-center text-center border "> <?= $message ?> </div>
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
                    <?php if (isset($_SESSION['id'])) : ?>
                        <b style="font-family:Rubik; color: #FCC632;"class=" visible lead"> Bienvenue Monsieur : <?= $_SESSION['name'] ?> </b>
                    <?php endif; ?>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
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
                      <a class="nav-link" href="course-quizes.php">General culture</a>
                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                            <?php if (isset($_SESSION['id'])) : ?>
                                <a class="nav-link" href="calendrier/3a-calendar.php">Calendrier</a>
                            <?php endif; ?>
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
                                <a href="index.php">Home</a>
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
        <h3> Grammar A1-A2: Adjectives and prepositions: </h3>
        <h3 class="lead pt-2">Choose the correct word.</h4>
            <br>
            <form method="POST" action="">
                <legend> <b>1:</b> I'm really proud ___ you!</legend>

                <input type="radio" name="c1" value="1"> OF
                <?php if(isset($_POST['c1']) AND $_POST['c1'] == "1"){      
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?>
                <br>

                <input type="radio" name="c1" value="2"> TO <?php if(isset($_POST['c1']) AND $_POST['c1'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                <input type="radio" name="c1" value="3"> WITH <?php if(isset($_POST['c1']) AND $_POST['c1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>

                <br>
                <br>

                <legend><b>2:</b> She's responsible ___ health and safety.</legend>
                <input type="radio" name="h1" value="1"> FOR <?php if(isset($_POST['h1']) AND $_POST['h1'] == "1"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?>
                <br>
                <input type="radio" name="h1" value="2"> IN <?php if(isset($_POST['h1']) AND $_POST['h1'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                <input type="radio" name="h1" value="3"> OFF <?php if(isset($_POST['h1']) AND $_POST['h1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <legend><b>3:</b> He's allergic ___ seafood.</legend>
                <input type="radio" name="o1" value="1"> OF <?php if(isset($_POST['o1']) AND $_POST['o1'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?>
                <br>
                <input type="radio" name="o1" value="2"> TO <?php if(isset($_POST['o1']) AND $_POST['o1'] == "2"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
                <input type="radio" name="o1" value="3"> WITH <?php if(isset($_POST['o1']) AND $_POST['o1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <legend><b>4:</b> They're interested ___ our project.</legend>
                <input type="radio" name="i1" value="1"> ABOUT <?php if(isset($_POST['i1']) AND $_POST['i1'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?>
                <br>
                <input type="radio" name="i1" value="2"> IN
                <?php if(isset($_POST['i1']) AND $_POST['i1'] == "2"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
                <input type="radio" name="i1" value="3"> ON <?php if(isset($_POST['i1']) AND $_POST['i1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <legend><b>5:</b> I'm addicted ___ that new series on Channel 4.</legend>
                <input type="radio" name="x1" value="1"> OF <?php if(isset($_POST['x1']) AND $_POST['x1'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?>
                <br>
                <input type="radio" name="x1" value="2"> TO <?php if(isset($_POST['x1']) AND $_POST['x1'] == "2"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
                <input type="radio" name="x1" value="3"> WITH <?php if(isset($_POST['x1']) AND $_POST['x1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <legend><b>6:</b> Sugar is bad ___ your teeth.</legend>
                <input type="radio" name="a1" value="1"> AT <?php if(isset($_POST['a1']) AND $_POST['a1'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?>
                <br>
                <input type="radio" name="a1" value="2"> FOR <?php if(isset($_POST['a1']) AND $_POST['a1'] == "2"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
                <input type="radio" name="a1" value="3"> OF <?php if(isset($_POST['a1']) AND $_POST['a1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <legend><b>7:</b> I'm really excited ___ the new house.</legend>
                <input type="radio" name="b1" value="1"> ABOUT <?php if(isset($_POST['b1']) AND $_POST['b1'] == "1"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?>
                <br>
                <input type="radio" name="b1" value="2"> OF <?php if(isset($_POST['b1']) AND $_POST['b1'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                <input type="radio" name="b1" value="3"> TO <?php if(isset($_POST['b1']) AND $_POST['b1'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <legend><b>8:</b> My boss is terrible ___ communicating.</legend>
                <input type="radio" name="b2" value="1"> AT <?php if(isset($_POST['b2']) AND $_POST['b2'] == "1"){
                           
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?>
                <br>
                <input type="radio" name="b2" value="2"> IN <?php if(isset($_POST['b2']) AND $_POST['b2'] == "2"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                <input type="radio" name="b2" value="3"> TO <?php if(isset($_POST['b2']) AND $_POST['b2'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>


                <br>
                <br>

                <input class="btn btn-outline-dark pl-5 pr-5" type="submit" name="submit" value="Finish">

                <input class="btn btn-outline-dark pl-5 pr-5" type="reset" name="reset" value="Try again">

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