<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<title>blog</title>
</head>


<body>

<!-- <div class="row"> -->
<div class="container" style="padding-top: 60px;">
  <h1 class="page-header" style="color:blue;">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
     <?php
         if(isset($_SESSION['username'])){
        ?>
        <?php
           $sql = "SELECT * FROM users WHERE username ='" .$_SESSION['username']."'";
            if(mysqli_query($con,$sql)){
           $reponse = mysqli_query($con,$sql);
           ?>
             <?php
                  while ($resultat = mysqli_fetch_array($reponse)) {?>
  <form class="form-horizontal" action="modifier-profil.php?id=<?php echo $id;?>" role="form" method="post"  enctype = "multipart/form-data">
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="text-center">
        <img src="image/<?php echo($resultat['avatar']);?>" class="avatar img-circle img-thumbnail" alt="avatar">
        <!-- <h6>Upload a different photo...</h6> -->
        <!-- <input type="file" class="text-center center-block well well-sm"> -->
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-8 col-xs-12 personal-info">
      <h3 class="info" style="color:blue;">Personal info</h3>

        <div class="form-group">
          <span><label class="col-lg-3 control-label">Username: <?php echo($resultat['username']);?></label></span>
          <div class="col-lg-8">
            <!-- <input class="form-control" value="Jane" type="text"> -->
          </div>
        </div>
        <div class="form-group">
          <span><label class="col-lg-3 control-label">Email: <?php echo($resultat['email']);?></label></span>
          <div class="col-lg-8">
            <!-- <input class="form-control" value="Bishop" type="text"> -->
          </div>
        </div>
        <br><br><br>
      <div class="form-group">
        <a href="modifier_profil.php?id=<?php echo($resultat['id']);?>" class="btn btn-primary" id="conn" role="button">Editer</a>
          <div class="col-lg-1">
            <!-- <input class="form-control" value="janesemail@gmail.com" type="text"> -->
          </div>
        </div>


    </div>
    </form>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    </div>
  </div>
</body>
</html>
