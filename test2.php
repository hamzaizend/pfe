<?php
$score = 0;
if(isset($_POST['submit'])){
  if(isset($_POST['choix']) AND $_POST['choix'] == 'tired' ){
    $resultat1 = "correct";
    $score++;
  }else{
$resultat1 =" la réponse est : tired";
  }
  if(isset($_POST['choix2']) AND $_POST['choix2'] == 'exciting' ){
    $resultat2 = "correct";
    $score++;
  }else{
$resultat2 =" la réponse est : exciting";
  }
  if(isset($_POST['choix3']) AND $_POST['choix3'] == 'annoying' ){
    $resultat3 = "correct";
    $score++;
  }else{
$resultat3 =" la réponse est : annoying";
  }
  if(isset($_POST['choix4']) AND $_POST['choix4'] == 'confusing'){
    $resultat4 = "correct";
    $score++;
  }else{
$resultat4 =" la réponse est : confusing";
  }
  if(isset($_POST['choix5']) AND $_POST['choix5'] == 'surprised'){
    $resultat5 = "correct";
    $score++;
  }else{
$resultat5 =" la réponse est : surprised";
  }
  if(isset($_POST['choix6']) AND $_POST['choix6'] == 'interested'){
    $resultat6 = "correct";
    $score++;
  }else{
$resultat6 =" la réponse est : interested";
  }
  if(isset($_POST['choix7']) AND $_POST['choix7'] == 'frightened'){
    $resultat7 = "correct";
    $score++;
  }else{
$resultat7 =" la réponse est : frightened";
  }
  if(isset($_POST['choix8']) AND $_POST['choix8'] == 'disappointing'){
    $resultat8 = "correct";
    $score++;
  }else{
$resultat8 =" la réponse est : disappointing";
  }
  $resultatt = "<h1> Total score is ".$score.' '.'out of 8 </h1>';
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
                        
                           <h3> Grammar A1-A2: Adjectives ending in '-ed' and '-ing': </h3>
                           <h4>Choose the correct word.</h4>
                           <br>
                         <form method="POST" action="">
                          <legend> 1: You look really ___. Why don't you go to bed ?</legend>
                           <input type="radio" name="choix" value="tired">  tired
                        <br>
                           <input type="radio" name="choix" value="tiring">  tiring<br>
                           
                          
                           
                           <?php echo $resultat1; ?>
                           <br>
                           <br>

                           <legend>2 : Can I call you? I've got some very ___ news for you!</legend>
                           <input type="radio" name="choix2" value="excited">  excited
                        <br>
                           <input type="radio" name="choix2" value="exciting">  exciting<br>
                           
                           
                           <?php echo $resultat2; ?>
                           <br>
                           <br>

                           <legend>3 : My neighbour is always playing loud music. It's very ___.</legend>
                            <input type="radio" name="choix3" value="annoyed">  annoyed
                        <br>
                           <input type="radio" name="choix3" value="annoying">  annoying<br>
                           
                           
                           <?php echo $resultat3; ?>
                           <br>
                           <br>

                           <legend>4 : The directions were ___ and we got lost.</legend>
                           <input type="radio" name="choix4" value="confused">  confused
                        <br>
                           <input type="radio" name="choix4" value="confusing">  confusing<br>
                           
                           
                           <?php echo $resultat4; ?>
                           <br>
                           <br>

                           <legend>5 : I was really ___ that I won the competition.</legend>
                           <input type="radio" name="choix5" value="surprised">  surprised
                        <br>
                           <input type="radio" name="choix5" value="surprising">  surprising<br>
                                                      
                           <?php echo $resultat5; ?>
                           <br>
                           <br>

                            <legend>6 : She didn't call about the car. I don't think she's ___ in buying it.</legend>
                           <input type="radio" name="choix6" value="interested">  interested
                        <br>
                           <input type="radio" name="choix6" value="interesting">  interesting<br>
                           
                          
                           <?php echo $resultat6; ?>
                           <br>
                           <br>

                            <legend>7 : My cats get really ___ when there's a thunderstorm.</legend>
                           <input type="radio" name="choix7" value="frightened">  frightened
                        <br>
                           <input type="radio" name="choix7" value="frightening">  frightening<br>
                          
                          
                           <?php echo $resultat7; ?>
                           <br>
                           <br>

                            <legend>8 : His exam results were really ___.</legend>
                           <input type="radio" name="choix8" value="disappointed">  disappointed
                        <br>
                           <input type="radio" name="choix8" value="disappointing">  disappointing<br>
                           
                          
                           <?php echo $resultat8; ?>
                           <br>
                           <br>

                           <input type="submit" name="submit" value="Finish"><br>
                            <?php echo $resultatt; ?><br>
                           <input type="reset" name="reset" value="try again">







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
                    <li><a href="em.php">Managed Website</a></li>
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