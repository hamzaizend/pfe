<?php
session_start();

include "connexion.inc.php";


if (!isset($_SESSION['id'])) {
  $_SESSION['flash']['danger']="Pour accéder au exercices veuillez vous connecter";
  header('Location: index.php');
  exit();
}

$requete= $bdd->prepare('SELECT id FROM test WHERE id_user=? and num=? and etat=?');
$requete->execute(array($_SESSION['id'],12,'Test Reussi'));
$ok=$requete->rowCount();
if($ok){
    $_SESSION['flash']['danger']="Vous avez déja réussi ce test vous pouvez passé au cours suivant";
    header('Location: course-general-english.php');
    exit();
}

$requete= $bdd->prepare('SELECT id FROM test WHERE id_user=? and num=? and etat=?');
$requete->execute(array($_SESSION['id'],11,'Test Reussi'));
$ok=$requete->rowCount();
if(!$ok){
    $_SESSION['flash']['danger']="Vous devez d'abbord passé et reussir le 3eme test de la section General english";
    header('Location: course-general-english.php');
    exit();
}



$score = 0;

if(isset($_POST['submit'])){
  

if(isset($_POST['x1']) AND $_POST['x1'] == "3"){
  $score++;
}
if(isset($_POST['x2']) AND $_POST['x2'] == "2"){
  $score++;
}
if(isset($_POST['x3']) AND $_POST['x3'] == "3" ){
  $score++;
}
if(isset($_POST['x4']) AND $_POST['x4'] == "1"){
  $score++;
}
if(isset($_POST['x5']) AND $_POST['x5'] == "1"){
  $score++;
}
if(isset($_POST['x6']) AND $_POST['x6'] == "3"){
  $score++;
}
if(isset($_POST['x7']) AND $_POST['x7'] == "2"){
  $score++;
}
if(isset($_POST['x8']) AND $_POST['x8'] == "3"){
  $score++;
}

$resultat = "Votre score est de ".$score." /8";
if($score == 8){
  $res_success = "Félécitations vous avez réussi le test ";
  $insert=$bdd->prepare("INSERT INTO test(id_user,num,etat) VALUES(?,?,?)");
  $delete=$bdd->prepare("DELETE FROM test WHERE etat=? AND id_user=? AND num=?");
  $insert->execute(array($_SESSION['id'],12,'Test Reussi'));
  $delete->execute(array('Test Pas Reussi',$_SESSION['id'],12));
  $_SESSION['flash']['success']=$res_success ." <br> ".$resultat;
  header('Location: course-general-english.php');
  exit();
}else{
  $res_fail = "EMM Dommage , vous pouvez réessayer ";
    $find=$bdd->prepare("SELECT id FROM test WHERE id_user=? AND num=? AND etat=?");
    $find->execute(array($_SESSION['id'],12,'Test Pas Reussi'));
    $ok=$find->rowCount();
  if(!$ok){ 
    $insert=$bdd->prepare("INSERT INTO test(id_user,num,etat) VALUES(?,?,?)");
    $insert->execute(array($_SESSION['id'],12,'Test Pas Reussi'));
    $_SESSION['flash']['danger']=$res_fail ." <br> ".$resultat;
  }
  else{
  $updatereq=$bdd->prepare("UPDATE test SET etat = Test Pas Reussi WHERE id_user=? and num=? ");
  $updatereq->execute(array($_SESSION['id'],12));
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
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
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
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php if (isset($_SESSION['id'])) : ?>
                        <b style="font-family:Rubik; color: #FCC632;"class=" visible lead"> Bienvenue Monsieur : <?= $_SESSION['name'] ?> </b>
                    <?php endif; ?>
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about-us.php">About</a>
                </li>
                <li class="nav-item submenu dropdown active">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Pages</a
                  >
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
    <section class="course_details_area section_gap bg-light text-center lead"> 
                        
                           <h3> Writing : A message to say you're late - preparation : </h3>
                          
                           
                         <form method="POST" action="">
                          
                          
                           
                           <h4>Choose the correct response :</h4>
                           <br>
                           <legend> <b> 1: </b> The king of the pumpkins </legend>
                           
                           <input type="radio" name="x1" value="1"> definitly lives in the middle of the forest . <?php if(isset($_POST['x1']) AND $_POST['x1'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                        
                           <input type="radio" name="x1" value="2"> lives in a field . <?php if(isset($_POST['x1']) AND $_POST['x1'] == "2"){
                           
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x1" value="3"> might live in the middle of the forest . <?php if(isset($_POST['x1']) AND $_POST['x1'] == "3"){
                            echo "<font color='green'>  ✔  </font>"; } ?> <br>   
                           <br>
                           <legend> <b> 2: </b> The narrator </legend>
                           <input type="radio" name="x2" value="1">  believes everything his mother says .<?php if(isset($_POST['x2']) AND $_POST['x2'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                        
                           <input type="radio" name="x2" value="2"> believes his mother's story about the king of the pumpkins . <?php if(isset($_POST['x2']) AND $_POST['x2'] == "2"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>
                           <input type="radio" name="x2" value="3"> never believes adults . <?php if(isset($_POST['x2']) AND $_POST['x2'] == "3"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?> <br>  
                           <br>
                            <legend> <b> 3: </b> The mother </legend>
                           <input type="radio" name="x3" value="1"> knows lots of facts .<?php if(isset($_POST['x3']) AND $_POST['x3'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                        
                           <input type="radio" name="x3" value="2" > talks nonsense . <?php if(isset($_POST['x3']) AND $_POST['x3'] == "2"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x3" value="3" > tells lots of stories .  <?php if(isset($_POST['x3']) AND $_POST['x3'] == "3"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>  
                           <br> 
                           <legend> <b> 4: </b> Mog</legend>
                           <input type="radio" name="x4" value="1"> has a special power .<?php if(isset($_POST['x4']) AND $_POST['x4'] == "1"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>
                        
                           <input type="radio" name="x4" value="2"> is an ordinary black cat .<?php if(isset($_POST['x4']) AND $_POST['x4'] == "2"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x4" value="3"> is a witch .  <?php if(isset($_POST['x4']) AND $_POST['x4'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>  
                           <br>  
                           <legend> <b> 5: </b> Mog and the narrator </legend>
                           <input type="radio" name="x5" value="1"> decide to try and find the king of the pumpkins .<?php if(isset($_POST['x5']) AND $_POST['x5'] == "1") {
                            echo "<font color='green'>  ✔  </font>"; } ?><br>
                        
                           <input type="radio" name="x5" value="2"> go for a walk in the woods .<?php if(isset($_POST['x5']) AND $_POST['x5'] == "2"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x5" value="3"> go to visit their grandmother .  <?php if(isset($_POST['x5']) AND $_POST['x5'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>  
                           <br>
                           <legend> <b> 6: </b> The narrator </legend>
                           <input type="radio" name="x6" value="1"> is an elf .<?php if(isset($_POST['x6']) AND $_POST['x6'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                        
                           <input type="radio" name="x6" value="2"> is an ordinary child .<?php if(isset($_POST['x6']) AND $_POST['x6'] == "2"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x6" value="3"> looks like an elf .  <?php if(isset($_POST['x6']) AND $_POST['x6'] == "3"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>  
                           <br>
                           <legend> <b> 7: </b> The narrator</legend>
                           <input type="radio" name="x7" value="1"> doesn't know what the king of the pumpkins does .<?php if(isset($_POST['x7']) AND $_POST['x7'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                        
                           <input type="radio" name="x7" value="2"> invents a story about what the king of the pumpkins does .<?php if(isset($_POST['x7']) AND $_POST['x7'] == "2"){
                            
                            echo "<font color='green'>  ✔  </font>"; 
                           } ?><br>
                           <input type="radio" name="x7" value="3"> knows what the king of the pumpkins does .  <?php if(isset($_POST['x7']) AND $_POST['x7'] == "3"){
                            echo "<font color='red'>  x  </font>"; } ?><br>  
                           <br>
                           <legend> <b> 8: </b> In the last line, the narrator suggests that stories </legend>
                           <input type="radio" name="x8" value="1"> are all nonsense  .<?php if(isset($_POST['x8']) AND $_POST['x8'] == "1"){
                            echo "<font color='red'>  x  </font>"; } ?><br>
                        
                           <input type="radio" name="x8" value="2"> are like lies  .<?php if(isset($_POST['x8']) AND $_POST['x8'] == "2"){
                            
                            echo "<font color='red'>  x  </font>"; 
                           } ?><br>
                           <input type="radio" name="x8" value="3"> can have a meaning even if they are not true .  <?php if(isset($_POST['x8']) AND $_POST['x8'] == "3"){
                            echo "<font color='green'>  ✔  </font>"; } ?><br>  
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
                    <form
                      target="_blank"
                      action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                      method="get"
                      class="form-inline"
                    >
                      <input
                        class="form-control"
                        name="EMAIL"
                        placeholder="Your Email Address"
                        onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Your Email Address'"
                        required=""
                        type="email"
                      />
                      <button class="click-btn btn btn-default">
                        <span>subscribe</span>
                      </button>
                      <div style="position: absolute; left: -5000px;">
                        <input
                          name="b_36c4fd991d266f23781ded980_aefe40901a"
                          tabindex="-1"
                          value=""
                          type="text"
                        />
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