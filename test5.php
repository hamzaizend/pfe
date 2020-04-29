<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pfe','root','root');

$text1=$_POST['text1'];
$text2=$_POST['text2'];
$text3=$_POST['text3'];
$text4=$_POST['text4'];
$text5=$_POST['text5'];
$text6=$_POST['text6'];
$text7=$_POST['text7'];
$text8=$_POST['text8'];
$text9=$_POST['text9'];
$text10=$_POST['text10'];

$score=0;

if(isset($_POST['submit'])) {
            if(isset($_POST['text1']) && $_POST['text1'] == 'many'){
              $score++;
              $resultat1 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat1 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text2']) && $_POST['text2'] == 'some'){
              $score++;
              $resultat2 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat2 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text3']) && $_POST['text3'] == 'any'){
              $score++;
              $resultat3 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat3 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text4']) && $_POST['text4'] == 'much'){
              $score++;
              $resultat4 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat4 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text5']) && $_POST['text5'] == 'a'){
              $score++;
              $resultat5 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat5 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text6']) && $_POST['text6'] == 'some'){
              $score++;
              $resultat6 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat6 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text7']) && $_POST['text7'] == 'any'){
              $score++;
              $resultat7 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat7 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text8']) && $_POST['text8'] == 'many'){
              $score++;
              $resultat8 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat8 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text9']) && $_POST['text9'] == 'any'){
              $score++;
              $resultat9 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat9 = "<font color='red'>  *  </font>";
            }
            if(isset($_POST['text10']) && $_POST['text10'] == 'any'){
              $score++;
              $resultat10 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat10 = "<font color='red'>  *  </font>";
            }


if($score == 10){
  $insert=$bdd->prepare("INSERT INTO test(num,etat) VALUES(?,?)");
  $insert->execute(array(5,'Test Réussi'));
}elseif($score != 10){
  $insert=$bdd->prepare("INSERT INTO test(num,etat) VALUES(?,?)");
  $insert->execute(array(5,'Test Pas Réussi'));
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
        #frame001 {
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            width: auto;
            height: auto;
            padding: 5px;
        }

        #color001 {
            color: black;
            font-size: large;
            text-align: left;
        }

        #center001 {
            text-align: center;
        }

        .button001 {
            background-color: blue;
            color: white;
            border-radius: 10px;
            padding: 5px;
            cursor: pointer;
        }

        .button002 {
            width: 10px;
            height: 10px;
         color : #00FF7F;
        }

.button003 {
            width: 10px;
            height: 10px;
            color: #FF0000;
        }

    </style>







  </head>

  <body>
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
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="home.php">Home</a>
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
                      <a class="nav-link" href="course-details.php"
                        >Course Details</a
                      >
                    </li>
                    
                  </ul>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact</a>
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
    <section class="course_details_area section_gap"> 
                        
                           <h3> Grammar A1-A2: Countable and uncountable nouns : </h3>
                           
                           <br>
                          <div id="frame001">
        <div id="color001">
            <div id="center001">
                
            <p>* Complete the sentences with one word *</p></div><br />

<form method="POST">
<p> 1 : How <input type="text" class="check003" id="input001" size="5"name="text1" value="<?php if(isset($text1)){
  echo $text1; }?>"/><text class="button002" id="check001"></text> people are coming ?  <?php echo $resultat1; ?><br> <br>

  2 : We've got <input id="input002" size="5" name="text2" value="<?php if(isset($text2)){
  echo $text2; }?>"/><text class="button002" id="check002"></text> <?php echo $resultat2; ?>  chiken but there isn't  <input id="input003" size="5" name="text3" value="<?php if(isset($text3)){
  echo $text3; }?>"/> <text class="button002" id="check003"></text><?php echo $resultat3; ?> rice .<br><br>
   
   3 : How <input id="input004" size="5"  name="text4" value="<?php if(isset($text4)){
  echo $text4; }?>"/><text class="button002" id="check004"></text> water do you think we need ? <?php echo $resultat4; ?><br><br>

  4 :  There's <input id="input005" size="5" name="text5" value="<?php if(isset($text5)){
  echo $text5; }?>"/><text class="button002" id="check005"></text> cat in the garden . <?php echo $resultat5; ?><br><br>


   5 : I've brought  <input type="text"  id="input006" size="5"  name="text6"  value="<?php if(isset($text6)){
  echo $text6; }?>"/><text class="button002" id="check006"></text> new shoes . <?php echo $resultat6; ?><br>
   <br>
    
    6 : Do you have  <input type="text"  id="input007" size="5" name="text7" value="<?php if(isset($text7)){
  echo $text7; }?>"/><text class="button002" id="check007"></text> advice for me ? <?php echo $resultat7; ?><br><br>

  7 : We have a  <input  id="input008" size="5" name="text8" value="<?php if(isset($text8)){
  echo $text8; }?>"/><text class="button002" id="check008"></text> <?php echo $resultat8; ?> of chairs but we don't have <input  id="input009" size="5" name="text9" value="<?php if(isset($text9)){
  echo $text9; }?>"/><text class="button002" id="check009"></text><?php echo $resultat9; ?> tables .<br>
<br>
8 : There isn't <input  id="input010" size="5" name="text10" value="<?php if(isset($text10)){
  echo $text10; }?>"/><text class="button002" id="check010"></text> toothpaste . <?php echo $resultat10; ?></p>


            <div id="disappear001"><div id="center001"><button class="button001" name="submit">Submit</button></div></div><br />
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