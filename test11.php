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

$score=0;

          if(isset($_POST['submit'])) {
            if(isset($_POST['text1']) && $_POST['text1'] == '3'){
              $score++;
              $resultat1 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat1 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text2']) && $_POST['text2'] == '1'){
              $score++;
              $resultat2 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat2 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text3']) && $_POST['text3'] == '4'){
              $score++;
              $resultat3 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat3 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text4']) && $_POST['text4'] == '7'){
              $score++;
              $resultat4 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat4 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text5']) && $_POST['text5'] == '8'){
              $score++;
              $resultat5 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat5 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text6']) && $_POST['text6'] == '5'){
              $score++;
              $resultat6 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat6 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text7']) && $_POST['text7'] == '2'){
              $score++;
              $resultat7 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat7 = "<font color='red'>  x  </font>";
            }
            if(isset($_POST['text8']) && $_POST['text8'] == '6'){
              $score++;
              $resultat8 =  "<font color='green'>  ✔  </font>";
            }else{
              $resultat8 = "<font color='red'>  x  </font>";
            }

if($score == 8){
  $insert=$bdd->prepare("INSERT INTO test(num,etat) VALUES(?,?)");
  $insert->execute(array(11,'Test Réussi'));
}elseif($score != 8){
  $insert=$bdd->prepare("INSERT INTO test(num,etat) VALUES(?,?)");
  $insert->execute(array(11,'Test Pas Réussi'));
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
                        
                           <h3> Grammar A1-A2: Articles 1 : </h3>
                           
                           <br>
                          <div id="frame001">
        <div id="color001">
            <div id="center001">
                
            <p>* Give the right order for the events bellow  *</p></div><br />

<form method="POST" action="">
<p> <input type="text" name ="text1" value="<?php if(isset($text1)){
  echo $text1; }?>"
  class="check003"  size="1" /><text class="button002" ></text> Henry changes what he usually thinks about .<?php echo $resultat1; ?><br> <br>

<input id="input002" size="1" name="text2"  value="<?php if(isset($text2)){
  echo $text2; }?>"/><text class="button002" id="check002"></text>Henry thinks he sees the beginning of a new star . <?php echo $resultat2; ?><br><br>

  <input id="input003" size="1" name="text3" value="<?php if(isset($text3)){
  echo $text3; }?>"/> <text class="button002" id="check003"></text>They see an image of the baby for the first time .<?php echo $resultat3; ?><br><br>
   
 <input id="input004" size="1" value="<?php if(isset($text4)){
  echo $text4; }?>" name="text4"/><text class="button002" id="check004"></text>The baby is born . <?php echo $resultat4; ?><br><br>

  <input id="input005" value="<?php if(isset($text5)){
  echo $text5; }?>"size="1"name="text5"/><text class="button002" id="check005"></text> They decide on a name for the baby .<?php echo $resultat5; ?><br><br>


  <input type="text" value="<?php if(isset($text6)){
  echo $text6; }?>" name="text6" id="input006" size="1" /><text class="button002" id="check006"></text> Henry feels really worried about his new responsibillities .<?php echo $resultat6; ?><br>
   <br>
    
  <input type="text" value="<?php if(isset($text7)){
  echo $text7; }?>" name="text7" id="input007" size="1" /><text class="button002" id="check007"></text> Anna gives Henry some news .<?php echo $resultat7; ?><br><br>

 <input  id="input008" name="text8" size="1" value="<?php if(isset($text8)){
  echo $text8; }?>" /><text class="button002" id="check008"></text> The baby moves inside Anna .<?php echo $resultat8; ?>












</p>


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