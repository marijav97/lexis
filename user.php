<?php

    session_start();
    include "connection.php";

    if(isset($_SESSION['user'])){
        if($_SESSION['user']->idRole != 2){
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="eng">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="Company, making the greatest websites. Best web design, graphic design, marketing and branding. ">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lexis - Web Design, Graphic Design</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
<!-- header section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.php">LEXIS</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
          <?php 
          $menu="SELECT * FROM menu WHERE flag=2";
          $prepare=$conn->query($menu);
          if($prepare->rowCount()>0){
            $link=$prepare->fetchAll();
          }
           
          foreach($link as $item):
          ?>
          <li><a href="<?=$item->menuLink?>"><?=$item->menuText?></a></li>
          <?php endforeach;?>
          <?php 
            if(isset($_SESSION['user'])):
              if(($_SESSION['user']->idRole==2) || ($_SESSION['user']->idRole==1)):
          ?>
          <li><a href="course.php">Course</a></li>
              <?php endif;?>
          <?php
            if(isset($_SESSION['user'])):
              if($_SESSION['user']->idRole==1): 
          ?>
          <li><a href="admin.php">Admin</a></li>
              <?php endif;?>
          <?php 	
						if(isset($_SESSION['idUser'])) :
					?> 
            <a href="logout.php" class="btn btn-large">Logout</a>
            <?php endif;?>
            <?php endif;?>
            <?php endif;?>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!-- banner text -->
  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <div class="banner-text text-center">
        <h1>Web design<br>graphic design<br>branding<br>marketing</h1>
        
      <!-- banner text --> 
    </div>
  </div>
</section>
<!-- header section --> 
<!-- intro section -->
<section id="intro" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>Learn HTML and CSS</h3>
      <p>Learn HTML and CSS basics now!Register if you don't have account and learn for free!</p>
      <?php 
        if(!isset($_SESSION['idUser'])):
      ?>
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
              <section id="contact" class="section">
              <div class="container">
              <div class="row">
              <div class="col-md-8 conForm">
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginForm" id="loginForm">
              <input name="email" id="email" type="email" placeholder="Email Address..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"  ><br/>
              <input name="password" id="password" type="password"  placeholder="Password..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" ><br/>
              <input type="submit" id="submitReg" name="sendLogin" class="sendLogin" value="Login">
            
              <div id="simple-msg"></div>
            </form>
            </div>
            </div>
            </div>
            </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php 
        if(!isset($_SESSION['idUser'])):
  ?>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalTwo">Register</button>
      <div class="modal fade" id="myModalTwo" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body">
              <section id="contact" class="section">
              <div class="container">
              <div class="row">
              <div class="col-md-8 conForm">
              <form method="post" action="register.php" name="regForm" id="regForm">
              <input name="firstName" id="firstName" type="text" placeholder="First Name..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"><br/>
              <input name="lastName" id="lastName" type="text" placeholder="Last Name..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"><br/>
              <input name="usernameReg" id="usernameReg" type="text" placeholder="Username..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" ><br/>
              <input name="emailReg" id="emailReg" type="email" placeholder="Email Address..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"><br/>
              <input name="passwordReg" id="passwordReg" type="password"  placeholder="Password..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" ><br/>
              <input type="submit" id="submitLogin" name="sendReg" class="submitLogin" value="Register"><br/>
              <div id="simple-msg"></div>
            </form>
            </div>
            </div>
            </div>
            </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
       </div>
     </div>
  </div>
        <?php endif;?>
    </div>
  </div>
</section>
<!-- intro section --> 
<!-- services section -->
<section id="services" class="services service-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-strategy"></span>
        <div class="services-content">
          <h5>Strategy & Consulting</h5>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec nulla non metus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-briefcase"></span>
        <div class="services-content">
          <h5>corporate identity</h5>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec nulla non metus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-tools"></span>
        <div class="services-content">
          <h5>web design and development</h5>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec nulla non metus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-genius"></span>
        <div class="services-content">
          <h5>Branding</h5>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec nulla non metus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-megaphone"></span>
        <div class="services-content">
          <h5>Digital marketing</h5>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec nulla non metus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-trophy"></span>
        <div class="services-content">
          <h5>Promotion material</h5>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Donec nulla non metus.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- services section --> 

<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec sed odio dui. Phasellus non dolor nibh. Nullam elementum Aenean eu leo quam..." </h1>
                <p>Rene Brown, Open Window production</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Cras dictum tellus dui, vitae sollicitudin ipsum. Phasellus non dolor nibh. Nullam elementum tellus pretium feugiat shasellus non dolor nibh. Nullam elementum tellus pretium feugiat." </h1>
                <p>Brain Rice, Lexix Private Limited.</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur...." </h1>
                <p>Andi Simond, Global Corporate Inc</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Lorem ipsum dolor sit amet, consectetur adipiscing elitPhasellus non dolor nibh. Nullam elementum tellus pretium feugiat. Cras dictum tellus dui sollcitudin." </h1>
                <p>Kristy Gabbor, Martix Media</p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials section --> 

<!-- our team section -->
<section id="teams" class="section teams">
  <div class="container">
    <?php
    $team=$conn->query("SELECT * FROM ourteam");
    foreach($team as $t):
    ?>
    <div class="row"  id="team">
      <div class="col-md-3 col-sm-6">
        <div class="person"><img src="images/<?=$t->image?>" alt="<?=$t->fullName?>" name="image" class="img-responsive">
          <div class="person-content">
            <h4><?=$t->fullName?></h4>
            <h5 class="role"><?=$t->position?></h5>
            <p><?=$t->description?></p>
          </div>
        </div>
      </div>
    <?php endforeach;?>
  </div>
</section>
<!-- our team section --> 



<!-- Footer section -->
<footer class="footer">
  <div class="footer-top section">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-6">
          <h5>Our Office Location</h5>
          <p>Collins Street West Victoria 8007 Australia.<br>
            1800 1234 56789 / 98532100987<br>
            support@lexis.com</p>
          <p>Copyright © 2015 Lexis Inc. All Rights Reserved. Made with <i class="fa fa-heart pulse"></i> by <a href="http://www.designstub.com/">Designstub</a></p>
          <a href="author.php">Author</a>
          <a href="documentation.php">Documentation</a>
        </div>
        <div class="footer-col col-md-3">
          <h5>Services We Offer</h5>
          <p>
          <ul>
            <li><a href="#">Digital Strategy</a></li>
            <li><a href="#">Websites</a></li>
            <li><a href="#">Videography</a></li>
            <li><a href="#">Social Media</a></li>
            <li><a href="#">User Experience</a></li>
          </ul>
          </p>
        </div>
        <div class="footer-col col-md-3">
          <h5>Share with Love</h5>
          <ul class="footer-share">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- footer top --> 
  
</footer>
<!-- Footer section --> 
<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script> 
<script src="js/script.js"></script> 
<script type="text/javascript" src="js/jquery.contact.js"></script>
</body>
</html>