<?php 

   ob_start();
   session_start();

   require_once 'db_connect.php';

   if (isset($_SESSION['customer'])){
   $res=mysqli_query($mysqli, "SELECT * FROM `customer` WHERE customer_id=". $_SESSION['customer']. "");
   $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
   }  

   if($_GET['id']) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM `media` WHERE media_id = {$id}";
      $result = $mysqli->query($sql);

      $row = $result->fetch_array();

   }

   if(isset($_POST['delete'])) {

      $sql = "DELETE FROM `media` WHERE media_id = {$id}";
      if($mysqli->query($sql) === TRUE) {
         header("Location: a_delete.php");
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
      .login{
        display: flex;
        flex-direction: column;
        width: 35%;
        margin: auto;
      }
      .field{
        height: 50px;
        margin: 15px 0;
        outline: none;
        border: none;
        border-bottom: 1px solid #009AEB;
        color: black;
        margin-top: 50px;
      }
      .btn-primary{
        height: 50px;
        width: 100px;
        margin-top: 40px;

      }

       .btn-danger{
        height: 50px;
        width: 80px;
        color: white;
        background-color: red;
      }

      .btn-danger p{
        color: white;
        margin-left: 20px;
        padding-top: 10px;
         margin-top: 40px;
      }

      input{
        background-color:#F9F9F9;
      }
      
      .text2{
        margin-bottom: 150px;
        margin-top: 50px;
      }
      
    </style>

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
      <a class="mainpageback" href="index.php"><div class="btn-danger"><p>Back</p></div></a>
      <hr>
      <form method="POST" accept-charset="utf-8">
         <h2>Are you sure you want to delete "<?php echo $row['mediaTitle'] ?>"? </h2>
         <?php echo "<a href='mediainfo.php?id=". $row['media_id']. "'><button class='btn btn-primary delete' type='button'>No go back</button></a>" ?>
         <input class="btn btn-danger delete" type="submit" name="delete" value="Delete">
      </form>
   </div>
   

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