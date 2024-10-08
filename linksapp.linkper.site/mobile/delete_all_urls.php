<?php
session_start();
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();

}

include "config.php";
$query="DELETE FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."'";
$run_query=mysqli_query($conn, $query);
if(!$run_query)
{
  echo '<script>confirm("There was a problem deleting your bookmarks. Try Again")</script>';
}
else {
  echo '<script>alert("Your bookmarks have been successfully deleted")</script>';

 //js for refreshing the page.
 ?>
   <script type="text/javascript">
     history.go(0); 
   </script>
 <?php
}
?>
