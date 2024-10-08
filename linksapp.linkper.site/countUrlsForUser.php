<?php
/*
   25/05/2022
   This code simply counts the number of rows in the
   table associated with the user. The user id is stored in the session array.
   the result is displayed in the span html element in the home.php file.
Author: Steward Mwanza
email: stewardmwanza28@gmail.com
PHP version: 7.4.0

*/
session_start();
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();
}

include "config.php";
$query="SELECT * FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."'";
$run=mysqli_query($conn, $query);
if(mysqli_num_rows($run)>1)
{
echo "✔ ".mysqli_num_rows($run)." URLs";
}
else {
     if(mysqli_num_rows($run)==1)
     {
       echo "✔ ".mysqli_num_rows($run)." URL";
     }
     else {
       echo "⭕ ".mysqli_num_rows($run)." Links"; 
     }
}
?>
