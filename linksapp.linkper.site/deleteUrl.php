<?php
session_start();
 if(!isset($_SERVER['HTTP_REFERER']))
 {
   header('Location: index.php');
   exist();
 }
 
 include "config.php";
 $url=$_GET['u'];
 $query="DELETE FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' AND `url`='".$url."'";
 $run=mysqli_query($conn, $query);
 if(!$run)
 {
   //not deleted.
   ?>
    <script type="text/javascript">
      confirm("URL couldn't be deleted. Try Again");
      window.location.replace("home.php");
    </script>

   <?php
 }
 else {/*
         $query="SELECT * FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' AND `url`='$url'"; 
         $id=mysqli_query($conn, $query);
         $genId=mysqli_fetch_array($id);
         echo $genId['ID']; 
         */ 
   ?>
       <script type="text/javascript">
          confirm("Your bookmark has been deleted successfully");
          window.location.replace("home.php"); 
       </script>
   <?php
 }
 ?>
