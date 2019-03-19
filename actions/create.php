<?php

  ob_start();
  session_start();

  require_once 'db_connect.php';

  if (isset($_SESSION['customer'])){
  $res=mysqli_query($mysqli, "SELECT * FROM `customer` WHERE customer_id=". $_SESSION['customer']. "");
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
  } 

  if(isset($_POST['create'])){
    $title = $_POST['title'];
    $img = $_POST['img'];
    $type = $_POST['type'];
    $publisher = $_POST['publisher'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $descrp = $_POST['desc'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $library = $_POST['library'];

    $sql = "INSERT INTO `media`(`title`, `image`, `ISBN`, 
    `descrp`, `status`, `borrow_price`, `fk_author_id`, 
    `fk_type_id`, `fk_publisher_id`, `fk_library_id`) 
    VALUES ('$title', '$img', '$isbn', '$descrp',
     '$status',
      $price,
       $author
     , $type,
      $publisher, $library);";

    if($mysqli->query($sql) === TRUE) {
       header("Location: index.php");
    } else {
        echo "Error while updating record : ". $mysqli->error;
    }
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

<style>
      
      .field{
        height: 50px;
        margin: 15px 0;
        outline: none;
        border: none;
        border-bottom: 1px solid #009AEB;
        color: black;
        margin-top: 50px;
        width: 350px;
        margin-left: 400px;
      }

      p{
        margin-left: 400px; 
        transform: translateY(50px);
      }
      
      .btn-success{
        height: 50px;
        width: 100px;
        margin-top: 40px;
        margin-left: 400px;
        margin-bottom: 150px;
      }
  
      input{
        background-color:#F9F9F9;

      }
      .navbar-brand p{
        margin-top: -50px;
      }
      .fas{
        margin-left: 200px;
      }
    </style>

</head>
<body>
  <div class="container-fluid">
    
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
    <div class="heading">
      <center><h1>Create a new record</h1></center>
    </div>
    
    <hr>
    <form class="updatemedia" method="POST" accept-charset="utf-8" action="create.php">
      <p>Title</p>
      <input class="field" type="text" name="title" maxlength="350" required>
      <p>Media Image (url)</p>
      <input class="field" type="text" name="img" maxlength="500" required>
      <p>Type</p>
      <select class="field" name="type">
        <?php
        $sql = mysqli_query($mysqli, "SELECT type_id,typeName FROM `type`");

        while($rowType = mysqli_fetch_assoc($sql)){
          echo "<option value='". $rowType["type_id"]. "'>". $rowType["type_id"]. "  ". $rowType["typeName"]. "</option>";
        }
        ?>
      </select>
      <p>Publisher</p>
      <select class="field" name="publisher">
        <?php

        $sql = mysqli_query($mysqli, "SELECT * FROM `publisher`");

        while($rowPublisher = mysqli_fetch_assoc($sql)){
          echo "<option value='". $rowPublisher["publisher_Id"]. "'>". $rowPublisher["publisher_Id"]. "  ". $rowPublisher["first_name"]." ". $rowPublisher["last_name"]." </option>";
        }

        ?>

      </select>
      <p>Author</p>
      <select class="field" name="author">
        <?php 
        $sql = mysqli_query($mysqli, "SELECT * FROM `author`");
        while($rowAuthor = mysqli_fetch_assoc($sql)){
          echo "<option value='". $rowAuthor["author_Id"]. "'>". $rowAuthor["author_Id"]. "  ". $rowAuthor["author_first_name"]. " ". $rowAuthor["author_last_name"]. "</option>";
        }
        ?>
      </select>
      <p>ISBN (If not a book insert 0)</p>
      <input class="field" type="text" name="isbn" maxlength="25" required>
      <p>Description</p>
      <textarea class="field" name="desc" maxlength="500" required></textarea>
      <p>Price</p>
      <input class="field" class="price" type="text" name="price" required>€
      <p>Status</p>
      <select class="field" name="status">
        <option value='0'>0) Not available</option>
        <option value='1'>1) Available</option>
      </select>
      <p>Library</p>
      <select class="field" name="library">
        <?php 
        $sql = mysqli_query($mysqli, "SELECT * FROM `library`");
        while($rowLibrary = mysqli_fetch_assoc($sql)){
          echo "<option value='". $rowLibrary["library_id"]. "'>". $rowLibrary["library_id"]. "  ". $rowLibrary["name"]. "</option>";
        }
        ?>
      </select>
      <p></p>
      <div class="row">
        <div class="col-lg-3">
      <input class="btn btn-success" type="submit" name="create" value="CREATE">
    </div>
    <div class="col-lg-2">
    </div>
    </div>
    </form>
  </div>



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
                            <p class="p2">© Copyright CodeFactory 2019. <br>All Rights Reserved.
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