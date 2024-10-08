<?php
session_start();
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();

}

include "config.php";
$url=mysqli_real_escape_string($conn, $_POST['url']);
$url = strtok($url, "#");
$subject=mysqli_real_escape_string($conn, $_POST['subject']);

if($url=="" || $subject=="")
{
  echo '<script>confirm("Fill in your Url and Subject");</script>';

}
else {
//insert the data in the linkstable
//before inserting, ensure that the same link does not exist
//in the table by the same user email.
$select_query="SELECT `url`,`user` FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' AND `url`='".$url."'";
$run_select_query=mysqli_query($conn, $select_query);
if(mysqli_fetch_array($run_select_query)>0)
{
  //It means the user already has that url. Therefore,
  //No need to restore again to avoid duplications in the table.
  echo '<script>confirm("You already Saved this Bookmark");</script>';

}
else {

   $query="INSERT INTO `linkstable`(`url`,`subject`,`user`) VALUES('".$url."','".$subject."','".$_SESSION['user_session']."')";
   $run=mysqli_query($conn, $query);
   if(!$run)
   {
     echo '<script>confirm("Not Saved Try Again");</script>';

   }
   else {
     echo '<script>confirm("Bookmark saved successfully");</script>';

   }

 }
}


?>
