<?php
session_start();
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="default/style.css">
        <title>mes messages</title>
    </head>
    <body>
  
<?php
           $art = "SELECT id_expediteur,titre,message FROM msg";
           $artquery = mysqli_query($con, $art);
           
        ?>
          <?php
          
               while ($article = mysqli_fetch_array($artquery)) {?>
                
                <form class="box" action="" method="post" enctype = "multipart/form-data">
          <div class="content" text-align="center">
            <h1>Mes message</h1>
             <form action="sms_users.php" method="post">
                       <label for="dest">Id_expediteur</label><?php echo($article['id_expediteur']);?><br /><br />
                       <label for="titr">Titre</label><?php echo($article['titre']);?><br /><br />
                       <label for="msg">Message</label><?php echo($article['message']);?><br /><br />
                       
	                 </form>

                   </div>
               </form>
             
               <?php } ?>


               