<?php
    session_start();
    include "connection.php";

    if(isset($_SESSION['user'])){
        if($_SESSION['user']->idRole != 1){

            $_SESSION['error'] ="You are not admin!";

            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] ="Login first!!";
        header("Location: index.php");
    }
    if(!isset($_GET['id'])){
      header("Location: admin.php");
      }
      
      $id = $_GET['id'];
      $upit = "SELECT * FROM users WHERE idUser = :id";
      $rezultat = $conn->prepare($upit);
      $rezultat->bindParam(":id", $id);
      $rezultat->execute();
      $korisnik_ch = $rezultat->fetch();
      if($korisnik_ch==null){
      echo "nije vam dobro";
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
          $menuTwo="SELECT * FROM menu WHERE flag IN(2,3,4)";
          $prepare=$conn->query($menuTwo);
          if($prepare->rowCount()>0){
           $linkTwo=$prepare->fetchAll();
          }
          foreach($linkTwo as $item):
          ?>
          <li><a href="<?=$item->menuLink?>"><?=$item->menuText?></a></li> 
          <?php endforeach;?>
          <?php 	
						if(isset($_SESSION['idUser'])) :
					?> 
            <a href="logout.php" class="btn btn-large">Logout</a>
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

<section>
    <div class="row addUpdate">
        <div class="col-md-8 updateInsert">
            <h4 class="heading">Add/Update</h4>
            <form action="updateForm.php" method="POST" class="formAdd">
              <input type="hidden" name="id" id="id" value="<?=$korisnik_ch->idUser?>"/>
                        <label>First Name</label>
                        <input name="firstName" id="firstName" type="text" placeholder="First Name..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" value="<?=$korisnik_ch->firstName?>"/><br/>
                       
                        <label>Last Name</label>
                        <input name="lastName" id="lastName" type="text" placeholder="Last Name..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"/><br/>
                        

                        <label>Email</label>
                        <input name="email" id="emai" type="email" placeholder="Email Address..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"/><br/>

                        <label>Password</label>
                        <input name="password" id="password" type="password"  placeholder="Password..." class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr"/><br/>

                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option value="0">Choose...</option>

            <?php
                $upit = "SELECT * FROM role";
                $rezultat = $conn->query($upit);
                $roles = $rezultat->fetchAll();

                foreach($roles as $r):
                    if($r->idRole == $user->idRole) :
 ?>
    <option selected value="<?= $r->idRole ?>"><?= $r->roleName?></option>
        <?php 
        else: 
            ?>
    <option value="<?= $r->idRole ?>"><?= $r->roleName ?></option>
            <?php
        endif;
    endforeach;?>
</select>
                        <br/>
                        <input type="submit" name="btnUsers" class="form-control btn btn-large"/>
                    </form>
        </div>
    </div>                  
</section>


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
<script src="js/update.js"></script> 
<script type="text/javascript" src="js/jquery.contact.js"></script>
</body>
</html>