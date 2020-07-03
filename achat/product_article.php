<?php
session_start();
 include '../config.php';

// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = "SELECT * FROM articles WHERE id = '?'";
    $stmtquery=mysqli_query($con, $stmt) or die(mysqli_error($con));
    // Fetch the product from the database and return the result as an Array
    $product = mysqli_fetch_array($stmtquery);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        die ('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    die ('Product does not exist!');
}


 if (isset($_POST['ajouter'])) {
    $produit = $product['id'];
    $user = $_SESSION['userID'];
    $quntite = $_POST['quantity'];
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM cart WHERE prod_id = '$produit' AND users_id = '$user'";
    $sqlquery = mysqli_query($con, $sql) or die(mysqli_error($con));
    $count = mysqli_num_rows($sqlquery);
       if($count > 0){
        echo "
        <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Product is already added into the cart Continue Shopping..!</b>
        </div> ";
  }  else {
    $add = "INSERT INTO cart (prod_id, users_id, quantity, date_cmd) VALUES ('$produit', '$user', '$quntite', '$date') ";
    if(mysqli_query($con,$sql)){
        echo "
            <div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Your product is Added Successfully..!</b>
            </div>
        ";
    }
}
}

//Affichage du nombre total des commandes du user
$code = $_SESSION['userID'];
$nbre = "SELECT COUNT(*) AS nbretotal FROM cart WHERE users_id = '$code'";
$nbrequery = mysqli_query($con, $nbre) or die(mysqli_error($con));
$nbrerow = mysqli_fetch_array($nbrequery);

//requete Affichage des commandes
$cmd = "SELECT * FROM cart WHERE users_id = '$code'";
$cmdquery = mysqli_query($con, $cmd) or die(mysqli_error($con));
?>

  <!DOCTYPE html>
 <html>
 <head>
	<title></title>
	<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
     <!-- Fontawesome File -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
  <body>
    
    <div class="container">
                    <div class="row" style="border: 2px solid green; border-radius: 5px;">
                       <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                         <img src="<?=$product['photo']?>" width="500" height="500" alt="<?=$product['nom']?>">
                       </div>
                       <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 " style="margin-top:15%;">
                       <ul class="navbar-nav ">
	<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fas fa-shopping-basket"></span>Cart<span class="badge"><?php echo($nbrerow['nbretotal']); ?></span></a>
					<div class="dropdown-menu" style="width:500px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
                                <table class="table">
                                    <tr>
                                        <thead class="thead-light">
                                            <th></th>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Quantité</th>
                                        </thead>
                                    </tr>
                                    <?php while ($cmdrow = mysqli_fetch_array($cmdquery)) {
                                        $idart = $cmdrow['prod_id'];
                                        $imageart = "SELECT * FROM articles  WHERE id = '$idart'";
                                        $imageartquery = mysqli_query($con, $imageart);
                                        $artrow = mysqli_fetch_array($imageartquery);
                                        $image = $artrow['photo'];
                                        $nom = $artrow['nom'];
                                        $prix = $artrow['prix'];
                                        ?>
                                        
                                    <tr>
                                    
                                        <tbody>
                                        <td><?php echo($image); ?></td>
                                        <td><?php echo($nom); ?></td>
                                        <td><?php echo($prix); ?></td>
                                        <td><?php echo($cmdrow['quantity']); ?></td>
                                        <!-- <td><a href="read_message.php?id=<php echo($cmdrow['id']); ?>"><button class="btn btn-primary">Lire</button></a></td> -->
                                    </tbody>
                                </tr>
                                <?php } ?>
                            </table>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in F CFA.</div>
								</div>
								</div>
							</div>
							<div class="panel-footer">
							<a href="paiement.php" class="btn btn-danger" name="lecture">valider paiement</a>
							<!-- <button class ="btn btn-danger" float ="right"></button> -->
							</div>
						</div>
					</div>
                            <h1 class="name"><?=$product['non']?></h1>
                            <span class="prix">
                               <?=$product['prix']?> F CFA
                            </span>
                            <form action="" method="post">
                                <input type="number" name="quantity"  min="1" placeholsder="Quantity" required>
                                <input type="hidden" name="product_id" value="<?=$product['id']?>">
                                <input type="submit" value="Add To Cart" name="ajouter">
                            </form>
                            <div class="description">
                                <?=$product['desc']?>
                            </div>
                       </div>
                     </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
 </html>
