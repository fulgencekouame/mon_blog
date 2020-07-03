<?php
include 'config.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">

       <!-- <link rel="stylesheet" href="jolimenu/style.css"> -->
     <link rel="stylesheet" href="blog.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
      <!-- <link rel="stylesheet" href="modal1.css"> -->
    <title>blog</title>
  </head>
  <body>



<!-- menu -->
<nav class="navbar navbar-dark fixed-top" style='background-color:black;color:white;'>

<a href="#"><img src="logo.png" class="logo" alt="" titl=""/></a>
<a class="navbar-brand" href="blog.php">Accueil</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<nav>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="contenu.html">Blog <span class="sr-only"></span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="interne.html">Nos prestations</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        A propos de
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="hebergement.html">hebergement</a>
        <a class="dropdown-item" href="restauration.html">Restauration</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="sport.html">Sport & Losir</a>
      </div>
    </li>
    </ul>
  </div>



</nav>
<!-- </div> -->


<!-- <div class="col-ms-4"> -->

<div class=avatar>
  <form class="form-inline my-2 my-lg-0">


  <!-- avatar -->
    <?php if(isset($_SESSION['username'])){echo ''.htmlentities($_SESSION['username'].'',ENT_QUOTES,'UTF-8');}?><br/>
       <?php
            if(isset($_SESSION['username'])){

          ?>
        <?php
           $sql = "SELECT avatar FROM users WHERE username ='" .$_SESSION['username']."'";
           if(mysqli_query($con,$sql)){
             $res = mysqli_query($con,$sql);
             while($row=mysqli_fetch_array($res)){
               $image = $row['avatar'];
               ?>
                 <div class="dropdown">
                   <h1 data-toggle="dropdown">
                     <span class=""><?php echo "<img src='image/$image' width='40px' height='35px'/>";?></span></h1>
                     <div class="dropdown-menu">
                       <a class="dropdown-item" href="profile.php">Profile</a>
                       <a class="dropdown-item" href="messages/send_messagesusers.php">Envoie message</a>
                       <a class="dropdown-item" href="logout.php">Deconnexion</a>
                      </div>
                </div>
            <?php
                 $id;
                }
              }

          ?>
    <?php
      }else{
          ?>
            <a href="login.php" class="btn btn-primary" id="con" role="button">Connexion</a>
              <?php}?>
      <?php } ?>
</div>
<div class=recherche>
  <form class="form-inline my-6 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>

  </form>
</div>



</nav>

</nav>

</div>

<!-- slider -->

    <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image2.jpg" alt="Los Angeles" width="100" height="300">
        <div class="carousel-caption">
          <h2>Chambres climatisées</h2>
          <p>Pour vos réunions d'affaire et week-end</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image3.jpg" alt="Chicago" width="100" height="300">
        <div class="carousel-caption">
          <h2>Chambres ventilées</h2>
          <p>Pour vos réunions d'affaire et week-end</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image4.jpg" alt="New York" width="100" height="300">
        <div class="carousel-caption">
          <h2>Résidence de confort</h2>
          <p>Pour vos séjours</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>



<!-- Articles -->
<div class="container">
<div class="article">
  <h2 class='prst' style='color:blue;'>Nos prestations</h2>
  <p class="luxe">Chez<strong> La Casa</strong>, tout est luxe: hebergement,restauration,divertissement,sport....</p>
</div>
</div>

    <div class="row">
        <?php
           $art = "SELECT * FROM articles WHERE statut = '1'";
           $artquery = mysqli_query($con, $art);
        ?>
          <?php
               while ($article = mysqli_fetch_array($artquery)) {?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12  text-center">
                 <div class="container-fluid">
                <div class="social-box">
                <div class="box">
                <div class="box-title">
                      <img src="admin/image/<?php echo($article['photo']);?>" class="rounded-circle" alt="Cinque Terre" width="304" height="236" >
                      <h2><span><?php echo($article['nom']);?></span> </h2>
                      <span> <p ><?php echo($article['Description']);?></p></span>
                       <h4 class='prix' style="color:red;"><?php echo($article['prix']);?>F CFA</h4>
                      <a href="achat/paiement.php?id=<?php echo($article['id']);?>" >Acheter</a>
                <div class="row">
                      <form action="" method="post">
                      <a href="register.php?id=<?php echo($article['id']);?> "></a>
                      </form>
                </div>

               </div>
               </div>
               </div>
               </div>
               </div>
                <?php } ?>
               </div>



<div class="container1">
  <h2> VOS RESERVATIONS</h2>

          <!-- <a type="button" class="button button2" href="file:///C:/Users/HP/Desktop/formulaire/form.html">Reserver</a> -->
          <a href="login_view.php" class="btn btn-primary" role="button">Reserver</a>

</div>

<!-- temoignages -->

<div class="container" id="temoignage">
            <h2>Témoignages</h2>


        <div class="container-fluid">


            <div class="how-section1">
                      <div class="row">
                          <div class="col-md-6 how-img">
                              <img src="dr.jpg" class="img-thumbnail" alt="Cinque Terre" width="400" height="400">
                          </div>
                          <div class="col-md-6">
                              <h4>M.Victor Charle</h4>
                                          <h4 class="subheading">Directeur de <strong>Monotel</strong> depuis 2010.</h4>
                          <p class="text-muted">Freedom to work on ideal projects. On GetLance, you run your own business and choose your own clients and projects. Just complete your profile and we’ll highlight ideal jobs. Also search projects, and respond to client invitations.
                                              Wide variety and high pay. Clients are now posting jobs in hundreds of skill categories, paying top price for great work.
                                              More and more success. The greater the success you have on projects, the more likely you are to get hired by clients that use GetLance.</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <h4>Mme.Ouley Mariam</h4>
                                          <h4 class="subheading">Avocate internationale et séduite par le luxe partagé chez nous</h4>
                                          <p class="text-muted">Streamlined hiring. GetLance’s sophisticated algorithms highlight projects you’re a great fit for.
                                              Top Rated and Rising Talent programs. Enjoy higher visibility with the added status of prestigious programs.
                                              Do substantial work with top clients. GetLance pricing encourages freelancers to use GetLance for repeat relationships with their clients.</p>
                          </div>
                          <div class="col-md-6 how-img">
                                <img src="temoin1.jpg" class="img-thumbnail" alt="Cinque Terre" width="400" height="400">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 how-img">
                                 <img src="temoin2.jpg" class="img-thumbnail" alt="Cinque Terre" width="400" height="400">
                          </div>
                          <div class="col-md-6">
                              <h4>M.Sylla</h4>
                                          <h4 class="subheading">Medécin Chercheur au ZOO d'Abidjan attiré par notre confort </h4>
                                          <p class="text-muted">Send and receive files. Deliver digital assets in a secure environment.
                                              Share feedback in real time. Use GetLance Messages to communicate via text, chat, or video.
                                              Use our mobile app. Many features can be accessed on your mobile phone when on the go.</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <h4>Stars pro</h4>
                                          <h4 class="subheading">Ce groupe de stars américaines passent chaque année leurs vacances chez nous</h4>
                                          <p class="text-muted">All invoices and payments happen through GetLance. Count on a simple and streamlined process.
                                              Hourly and fixed-price projects. For hourly work, submit timesheets through GetLance. For fixed-price jobs, set milestones and funds are released via GetLance escrow features.
                                              Multiple payment options. Choose a payment method that works best for you, from direct deposit or PayPal to wire transfer and more.</p>
                          </div>
                          <div class="col-md-6 how-img">
                                <img src="stars.jpg" class="img-thumbnail" alt="Cinque Terre" width="400" height="400">

</div>
</div>
</div>
</div>
</div>
<!-- contact -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container" Id="contact">
    <h2 class="text-center">Contactez-nous!!!!</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="mail.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope">vos contacts</i></h3>
                                    <p class="m-0">remplissez le formulaire </p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nom et prenoms" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="nombre" name="email" placeholder="email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="ecrivez-nous" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Envoyez" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>

<!-- Footer -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="footer">
	<div class="footer1">
<div class="container-fluid">

	<div class="container ">
	<div class="row">
		<div class="col-sm-4">
		  <h2>Geolocalisation</h2><p>
                           <div class="myframegmap">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d448183.73912804417!2d76.81306640115254!3d28.646677246352574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x37205b715389640!2sDelhi!5e0!3m2!1sen!2sin!4v1513154329228" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div></p><br>
		</div>
		<div class="col-sm-4">
			<h2>Menu</h2>
			<p>
				<i class="fa fa-home"></i>    <a href="blog.php"> Accueil</a><br>
				<i class="fa fa-user-o"></i>    <a href="contenu.html"> Blog</a><br>
				<i class="fa fa-map-marker"></i>    <a href="interne.html"> Nos prestations</a><br>
				<!-- <i class="fa fa-briefcase"></i>    <a href="#"> A propos</a><br> -->



			</p>


		</div>
		<div class="col-sm-4 ">
			<h2>Contact </h2>
			<p >

				<i class="fa fa-phone"></i>    <a href="tel:+225 49221939"> +225 49221939</a><br>
				<i class="fa fa-envelope"></i>    <a href="kouamekouakoufulgence9@gmail.com"> kouamekouakoufulgence9@gmail.com</a><br>
				<i class="fa fa-map-marker"></i>     8ieme tranche_Angre, Cote d'Ivoire
			</p>

			<br>
		</div>
	</div>
		<div class="clear30"></div>
</div>
</div></div>


<div class="footer2">
	<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="clear30"></div>
			<div class="col-sm-12 text-center"><p><strong>copyright © 2020 All right reserved.</strong></p></div>
			<div class="clear30"></div>
		</div>

	</div>

</div>
</div>
</div>
	<!-- ./Footer -->



<!-- fermeture main -->
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="blog.js"></script>
<script src="modal.js"></script>

<!-- <script src="jolimenu/app.js">

</script> -->
  </body>
</html>
