<?php
session_start();
include 'config.php';
?>
<?php
$id = $_GET['id'];
$sql ="SELECT * FROM users where username = '$username'";
 $result = mysqli_query($con,$sql);

 $num = mysqli_num_rows($result);

 $i = 0;

 while ($i < $num)
 {
   $autoid = mysqli_result($result,$i,"id");
   $username = mysqli_result($result,$i,"username");
    $email = mysqli_result($result,$i,"email");
    $password = mysqli_result($result,$i,"password");
    $avatar = mysqli_result($result,$i,"avatar");
   $i++;
 }

?>
<!-- <?php
 require_once("functions/function.php");
 get_header();
 get_sidebar();
 get_bread_four();
?> -->
     <div class="row-fluid sortable">
       <div class="box span12">
         <div class="box-header" data-original-title>
           <h2><i class="halflings-icon white edit"></i><span class="break"></span>Update User's Data</h2>
           <div class="box-icon">
             <a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
           </div>
         </div>
         <div class="box-content">
           <form class="form-horizontal" method="post" action="update_data.php">
             <fieldset>
               <div class="control-group">
               <label class="control-label" for="focusedInput">Username:</label>
               <div class="controls">
                 <input class="input-xlarge focused" name="username" id="focusedInput" type="text" placeholder="Username"
                 value="<?php echo $username; ?>">
               </div>
               </div>
               <div class="control-group">
               <label class="control-label" for="focusedInput">Password:</label>
               <div class="controls">
                 <input class="input-xlarge focused" name="password" id="focusedInput" type="password" placeholder="Password"
                 value="<?php echo $password; ?>">
               </div>
               </div>

               <div class="control-group">
               <label class="control-label" for="focusedInput">Email:</label>
               <div class="controls">
                 <input class="input-xlarge focused" name="email" id="focusedInput" type="text" placeholder="Email"
                 value="<?php echo $email; ?>">
               </div>
               </div>

               <div class="control-group">
               <label class="control-label" for="focusedInput">photo:</label>
               <div class="controls">
                 <input class="input-xlarge focused" name="avatar" id="focusedInput" type="files" placeholder="photo"
                 value="<?php echo $avatar; ?>">
               </div>
               </div>


               <div class="form-actions">
               <button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Save Changes</button>
               <input type="hidden" name="hid" value="<?php echo $autoid; ?>">
               </div>
             </fieldset>
           </form>

         </div>
       </div><!--/span-->

     </div><!--/row-->
<?php
 get_footer();
?>
