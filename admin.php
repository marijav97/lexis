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
<h3 class="heading">Users</h3>
<?php
    $items="SELECT u.idUser, u.firstName,u.lastName, u.username, u.email FROM users u INNER JOIN role r ON u.idRole=r.idRole WHERE u.idRole=2";
    $prep=$conn->prepare($items);
    $res=$prep->execute();
    $items=$prep->fetchAll();
    $no=1;
?>
<section>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Update User</th>
            <th>Delete User</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($items as $one): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$one->firstName." ".$one->lastName?></td>
            <td><?=$one->username?></td>
            <td><?=$one->email?></td>
            <td><a href="updatework.php?id=<?=$one->idUser?>" class="btn btn-large">Update User</a></td>
            <td><a href="deletework.php?id=<?=$one->idUser?>" class="btn btn-large">Delete User</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
        <td colspan="5"><a href="addwork.php" class="btn btn-large">Add User</a></td>
        </tr>
        </tbody>
        
    </table>

    <h3 class="heading">Our Work</h3>
    <?php
    $work="SELECT * FROM work ";
    $prep1=$conn->prepare($work);
    $res1=$prep1->execute();
    $work=$prep1->fetchAll();
    $no1=1;
?>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Work</th>
            <th>Image</th>
            <th>Description</th>
            <th>Update User</th>
            <th>Delete User</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($work as $w): ?>
        <tr>
            <td><?=$no1++?></td>
            <td><?=$w->name?></td>
            <td id="imagePanel">
                <img src="<?=$w->image?>" class="thumbnail" alt="<?=$w->name?>">
            </td>
            <td><?=$w->description?></td>
            <td><a href="updateprod.php?id=<?=$w->idWork?>" class="btn btn-large">Update Work</a></td>
            <td><a href="deleteproduct.php?id=<?=$w->idWork?>" class="btn btn-large">Delete Work</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
        <td colspan="5"><a href="addproduct.php" class="btn btn-large">Add Work</a></td>
        </tr>
        </tbody>
        
    </table>
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
<script src="js/script.js"></script> 
<script type="text/javascript" src="js/jquery.contact.js"></script>
</body>
</html>
