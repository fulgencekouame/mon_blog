<?php
session_start();
 include '../config.php';

// // Check to make sure the id parameter is specified in the URL
// if (isset($_GET['id'])) {
//     // Prepare statement and execute, prevents SQL injection
//     $stmt = $bdd->prepare('SELECT * FROM products WHERE id = ?');
//     $stmt->execute([$_GET['id']]);
//     // Fetch the product from the database and return the result as an Array
//     $product = $stmt->fetch(PDO::FETCH_ASSOC);
//     // Check if the product exists (array is not empty)
//     if (!$product) {
//         // Simple error to display if the id for the product doesn't exists (array is empty)
//         die ('Product does not exist!');
//     }
// } else {
//     // Simple error to display if the id wasn't specified
//     die ('Product does not exist!');
// }


//  if (isset($_POST['ajouter'])) {
//     $produit = $product['id'];
//     $user = $_SESSION['userID'];
//     $quntite = $_POST['quantity'];
//     $date = date("Y-m-d H:i:s");

//     $sql = "SELECT * FROM cart WHERE prod_id = '$produit' AND users_id = '$user'";
//     $sqlquery = mysqli_query($con, $sql) or die(mysqli_error($con));
//     $count = mysqli_num_rows($sqlquery);
//        if($count > 0){
//         echo "
//         <div class='alert alert-warning'>
//                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//                 <b>Product is already added into the cart Continue Shopping..!</b>
//         </div> ";
//   }  else {
//     $add = "INSERT INTO cart (prod_id, users_id, quantity, date_cmd) VALUES ('$produit', '$user', '$quntite', '$date') ";
//     if(mysqli_query($con,$sql)){
//         echo "
//             <div class='alert alert-success'>
//                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//                 <b>Your product is Added Successfully..!</b>
//             </div>
//         ";
//     }
// }
// }

// //Affichage du nombre total des commandes du user
// $code = $_SESSION['userID'];
// $nbre = "SELECT COUNT(*) AS nbretotal FROM cart WHERE users_id = '$code'";
// $nbrequery = mysqli_query($con, $nbre) or die(mysqli_error($con));
// $nbrerow = mysqli_fetch_array($nbrequery);

// //requete Affichage des commandes
// $cmd = "SELECT * FROM cart WHERE users_id = '$code'";
// $cmdquery = mysqli_query($con, $cmd) or die(mysqli_error($con));

//insertion des données de la carte bancaire
if (isset($_POST['valider'])) {
    $firstname = $_SESSION['username'];
    // $lastname = $_SESSION['userLastname'];
    $type = $_POST['type'];
    $cnumber = $_POST['cardNumber'];
    $cvc = $_POST['cardCVC'];
    $datexp = $_POST['cardExpiry'];

    $card = "INSERT INTO userccbilling (firstname, lastname, type, cnumber, cvc, dateexpire) VALUES ('$firstname', '', '$type', '$cnumber', '$cvc', '$datexp')";
    $cardquery = mysqli_query($con, $card) or die(mysqli_error($con));
}

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
    <center>
    <div class="container">
        <div class="row" style="">
               <form action="" method="post">
                  <!-- CREDIT CARD FORM STARTS HERE -->
                  <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td" >Payment Details</h3>
                            <div class="display-td" >                            
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>                    
                    </div>
                    <div class="panel-body">
                        <form role="form" id="payment-form" method="POST" action="">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="cardNumber">TYPE CARTE</label>
                                        <select name="type" id="" class="form-control">
                                            <option selected disabled>Choisir type de carte</option>
                                            <option value="Master card">Master card</option>
                                            <option value="Visa">Visa</option>
                                            <option value="American express">American express</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cardNumber">CARD NUMBER</label>
                                        <div class="input-group">
                                            <input 
                                                type="tel"
                                                class="form-control"
                                                name="cardNumber"
                                                placeholder="Valid Card Number"
                                                autocomplete="cc-number"
                                                required autofocus 
                                            />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                    <div>                            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input 
                                            type="tel" 
                                            class="form-control" 
                                            name="cardExpiry"
                                            placeholder="MM / YY"
                                            autocomplete="cc-exp"
                                            required 
                                        />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cardCVC">CV CODE</label>
                                        <input 
                                            type="tel" 
                                            class="form-control"
                                            name="cardCVC"
                                            placeholder="CVC"
                                            autocomplete="cc-csc"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="submit" class="subscribe btn btn-success btn-lg btn-block" type="button" value="VALIDER MA COMMANDE" name ="valider">
                                </div>
                            </div>
                            <div class="row" style="display:none;">
                                <div class="col-xs-12">
                                    <p class="payment-errors"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>            
                <!-- CREDIT CARD FORM ENDS HERE -->
               </form>        
        </div>
    </div>
    </center>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </body>
 </html>
