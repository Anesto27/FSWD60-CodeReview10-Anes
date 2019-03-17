<?php

  ob_start();
  session_start();

  require_once 'db_connect.php';

  if (isset($_SESSION['customer'])){
  $res=mysqli_query($mysqli, "SELECT * FROM `customer` WHERE customer_id=". $_SESSION['customer']. "");
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 

   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="container">
    
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <img src="../img/logo.svg" alt="Foto" width=100px height=50px class="photo">
      <a class="navbar-brand" href="#"><p>Library</p>
    </div></a>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="active"><a href="login.php" title="Login">
      <?php
        if (isset($_SESSION['customer'])) {
          $displayName = $userRow['first_name']. " ". $userRow['last_name'];
          echo '<i class="fas fa-sign-out-alt"></i> '.$displayName;
        }
        else {
          echo '<i class="fas fa-sign-in-alt"></i> Login';
        }
      ?>
      </a>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <center><h1>Welcome to the Library!</h1></center>
    <hr class="hr">
</div>
  <div class="button1">
    <?php 
        if(isset($_SESSION['customer'])){
            echo'
              <a href="create.php" title="new entry"><button class="btn btn-primary" type="submit">New Entry</button></a>';
        }
     ?>
  </div>

  <?php 

      $sql=mysqli_query($mysqli, "SELECT * FROM `media` INNER JOIN `author` ON fk_author_id = author_id INNER JOIN `type` ON fk_type_id = type_id");

      $count = mysqli_num_rows($sql);

      if($count > 0) {
        while($row = mysqli_fetch_array($sql)){
        echo "
             <hr>
          <div class='row'>
            <div class='thumbnails col-md-4'>
                <div class='image'>
                  <img src='". $row["image"]. "' alt='image' width=300px height=500px>
                </div>
                <p>". $row["ISBN"]. "</p>
              </div>
              <div class='data col-md-7'>
                <h2>". $row["title"]. "</h2>
                <p>by: ". $row["author_first_name"]. " ". $row["author_last_name"]. "</p>
                <p>type: ". $row["typeName"]. "</p>
                <p class='desc'>". $row["descrp"]. "</p>
                <a href='mediaInfo.php?id=". $row['media_id']. "'><button class='btn btn-primary media' type='button'>Show Media</button></a>
              </div>
            </div>
            ";
        }
      }
else {
          echo "No data available";
      }
   ?>

<footer id="myFoot" class="footer">        
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="widget widget-text">
                        <img src="../img/logo.svg" alt="logo-footer" width=200px height=150px>
                    </div>
                </div><!-- /.col-md-12 -->    
            </div><!-- /.row -->    

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="sidebar-inner-footer">
                        <div class="widget widget-infomation">
                            <ul class="flat-information">
                                <li class="email"><i class="fa fa-envelope" aria-hidden="true"></i> CodeFactory@gmail.com</li>
                                <li class="phone"><i class="fa fa-user" aria-hidden="true"></i> Smajic Anes</li>  
                                <li class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> Kettenbrückengasse 23/2/12 1050 Vienna</li>    
                            </ul>
                            <hr>
                        </div>
                    </div><!-- /.sidebar-inner-footer -->    
                </div><!-- /.col-md-12 -->    
            </div><!-- /.row -->       
        </div><!-- /.container -->
    

    <!-- Bottom -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="line-top"></div>
                </div>
            </div>
            <div class="row">
                <div class="container-bottom">
                    <div class="col-md-6">
                        <div class="copyright"> 
                            <p>© Copyright CodeFactory 2019. <br>All Rights Reserved.
                            </p>
                        </div>                   
                    </div><!-- /.col-md-6 -->

                    <div class="col-md-6">
                        <ul class="icons">
                                <li>
                                    <a href="https://www.facebook.com/CodeFactoryVienna/">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span class="fab fa-facebook-f" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/codefactoryvienna/">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span class="fab fa-instagram" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/codefactory?lang=de">
                                        
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span class="fab fa-twitter" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>   
                    </div><!-- /.col-md-6 -->
                </div><!-- /.container-bottom -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
     </footer>

</body>
</html>