<?php
session_start();
 if(!isset($_SERVER['HTTP_REFERER']))
 {
 	header('Location: index.php');
 }

include "config.php";
$newEmail=mysqli_real_escape_string($conn, $_POST['newEmail']);
if($newEmail=="")

{
	echo "email can not be empty<br>"; 
 }
 else
 {
    $query="UPDATE `linkstable` SET `userTwo`='$newEmail' WHERE `user`='".$_SESSION['user_session']."'";
    $run=mysqli_query($conn, $query); 
    if(!$query)
    {
      echo "Failed to Link email";
    }
    else
    {
     echo "Successfully Linked to ".$_SESSION['user_session']; 
     
    }
 }
 
?>