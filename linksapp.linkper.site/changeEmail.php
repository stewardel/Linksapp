<?php
session_start();
 if(!isset($_SERVER['HTTP_REFERER']))
 {
 	header('Location: index.php');
 }

include "config.php";
$newEmail=mysqli_real_escape_string($conn, $_POST['newEmail']);
if($newEmail=="")
	echo "New email can not be empty<br>"; 
 if(filter_var($newEmail, FILTER_VALIDATE_EMAIL))
 {
   
   $run=mysqli_query($conn, "UPDATE `users` SET `email`='$newEmail' WHERE `email`='".$_SESSION['user_session']."'");
	   if(!$run)
	   {
	     echo "Could not update your new Email";
	   }
	   else
	   {
	   	  $query="UPDATE `linkstable` SET `user`='$newEmail' WHERE `user`='".$_SESSION['user_session']."'"; 
	   	  $runSecondQuery=mysqli_query($conn, $query);
	   	  if(!$runSecondQuery)
	   	  {
	   	  	echo "Could not fully change email.";
	   	  }
	   	  else{
	   	  	echo "Your email has been changed";
	   	  	$_SESSION['user_session']=$newEmail; 
	   	  	
	   	  }
	   }
 }
 else
 {
 	echo $newEmail." is not a valid email.";
 }
 
?>