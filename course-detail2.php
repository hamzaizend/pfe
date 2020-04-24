<?php 
 session_start();

    $db = new PDO('mysql:host=localhost;dbname=pfe','root','root');
    
    

    $req = $db->query('SELECT id FROM skills');

    $nbre_total_articles = $req->rowCount();

    $nbre_articles_par_page = 1;

    $nbre_pages_max_gauche_et_droite = 3;

    $last_page = ceil($nbre_total_articles / $nbre_articles_par_page);

    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        $page_num = $_GET['page'];
    } else {
        $page_num = 1;
    }

    if($page_num < 1){
        $page_num = 1;
    } else if($page_num > $last_page) {
        $page_num = $last_page;
    }

    $offset = ($page_num - 1) * $nbre_articles_par_page ;
    
   
    //Cette requête sera utilisée plus tard
    $sql = 'SELECT * FROM skills ORDER BY id LIMIT '.$offset.' , '.$nbre_articles_par_page.' ';

    $pagination = " ";

    if($last_page != 1){
        if($page_num > 1){
            $previous .= $page_num-1;
            $pagination .= '<a href="course-detail2.php?page='.$previous.'">Précédent</a>';

            for($i=$page_num-$nbre_pages_max_gauche_et_droite; $i<$page_num; $i++){
                if($i > 0){
                    $pagination .= '<a href="course-detail2.php?page='.$i.'">'.$i.'</a>';
                }
            }
        }

        $pagination .= '<span class="active">'.$page_num.'</span>';

        for($i=$page_num+1; $i <= $last_page; $i++){
            $pagination .= '<a href="course-detail2.php?page='.$i.'">'.$i.'</a> ';
            
            if($i >= $page_num + $nbre_pages_max_gauche_et_droite){
                break;
            }
        }

        if($page_num != $last_page){
            $next .= $page_num + 1;
            $pagination .= '<a href="course-detail2.php?page='.$next.'">Suivant</a> ';
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
            
  img{
    margin-top: : 20px;
    margin-bottom: 30px;
  }

strong{
  color : #000000;
}

        h1{
            background-color: #4682B4;
            text-align: center;
            border-radius: 5px;
            color: #FFF;
            box-shadow: 5px 2px 3px #000;
            font-style: italic;
            
            padding: 10px;
        }

        a, a:visited{
            color: blue;
        }

        #pagination{
            background-color: #eaeaea;
            padding: 10px;
        }

        #pagination .active{
            background-color: #012;
            color: #FFF;
            padding: 0px 5px 0px 5px;
            border-radius: 20%;
        }

        .post{
            
            margin-bottom: 30px;
            padding-left: 30px;
            padding-right: 10px;
            border-radius: 4px;
            padding-bottom: 40px;
            padding-top: 20px;
          
            
        }

        .test{
          color: #A9A9A9;
           margin-bottom: 30px;
            padding-left: 30px;
            padding-right: 10px;
            border-radius: 4px;
            padding-bottom: 40px;
            padding-top: 20px;

        }
.tips{
  color: #000000;
   margin-bottom: 30px;
            padding-left: 30px;
            padding-right: 10px;
            border-radius: 4px;
            padding-bottom: 30px;
            padding-top: 20px;
}
        

        .h2 {
    font-size: 2.5em;
   
    line-height: 2em;
    
   
    background-color: #D3D3D3;
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
                  <a href="course-detail.php">Skills</a>

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
                        <div class="content">
                           
                            <br>
                           <?php 
            echo "<p><strong>($nbre_total_articles)</strong> articles au total !<br/>";
            echo "Page <b>$page_num</b> sur <b>$last_page</a>";

            $req = $db->query($sql);

            while($data = $req->fetch()){
                echo '<div>'.$data['titre'].'</div><br><div class="test">'.$data['content'].'</div>';
            }

            echo '<div id="pagination">'.$pagination.'</div>';


            $req->closeCursor();
        ?>
                        </div>

                        
                        

                      

                           
                       
                  
               


                
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