<?php
session_start(); 
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit;
}


?>
<html>
<head>
  <title>Linkper, Home</title>
  <link rel="shortcut icon" type="image/png" href="icons/linkper.png"/>
  <link rel="stylesheet" href="css/style.css"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script type="text/javascript" src="jquery.js"></script>
</head>
<body>

</body>
</html>

<?php

include "config.php";

$email=mysqli_real_escape_string($conn, $_POST['email']);
  $_SESSION['user_session']=$email; 
 
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
  //insert the username into the users table.
  //but first check if it doesnt already exist.
 $query="SELECT `email` FROM `users` WHERE `email`='$email'";
 $run_query=mysqli_query($conn, $query);
   if(mysqli_fetch_array($run_query) > 0)
   {
   
     
     ?>

          <script type="text/javascript">
                 window.location.href="home.php";
                 
          </script>
     <?php
   }
   else {
     //insert into the table then
     //set the session .

      $query="INSERT INTO `users`(`email`) VALUES('".$email."')";
      $run_query=mysqli_query($conn, $query);
      if(!$run_query)
      {
        echo "There is a Problem. Try Again";
      }   else {
          //$_SESSION['user_session']=$email;
          ?>

               <script type="text/javascript">
                 window.location.href="home.php";
               </script>
          <?php
      }
   }

}
else {
      ?>
          <html>
          <head>
            <title></title>

          </head>
          <body>

               <span id="pop_up_span"><img src="icons/error.jpg" id="error_img_src"/>
                 Error: Invalid Email
               </span>
          </body>
          </html>

      <?php
}
 ?>
