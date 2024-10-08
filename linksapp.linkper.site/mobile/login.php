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
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
           
#icon_img_src{
  position: inherit;
  display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;
    margin-top: 30px;

}

#email_input_box{
    position: inherit;
  display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 80px; 
    text-align: center;
    border-radius: 6px;
    border-style: solid;
    height: 35px;
    border-color: #1e90ff;

}

#go_btn{
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 10px;
  border-radius: 6px;
  border-style: none;
  color: white;
  background-color: #1e90ff;
  height: 35px;
  width: 192px;
  padding-left: 20px;
  padding-right: 20px;
  font-size: 13px;
}

#welcome_span{
  position: absolute;
  margin-top: 30px; 
  color: #1e90ff;
  text-align: center;
  text-decoration-style: wavy;
  font-size: 15px;
  overflow: auto;
  font-style: italic;
}


body{
     font-family: sans-serif;
}

#error_img_src{
   height: 20px;
   width: 20px;
   margin-top: 5px;
}

#pop_up_span{
  display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 5px;
    text-align: center;
    font-size: 13px;
    width: 230px;

}

 
   </style>
   <script type="text/javascript" src="jquery.js"></script>
</head>
<body>

</body>
</html>

<?php

include "config.php";

$email=mysqli_real_escape_string($conn, $_POST['email']);
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
  //insert the username into the users table.
  //but first check if it doesnt already exist.
 $query="SELECT `email` FROM `users` WHERE `email`='$email'";
 $run_query=mysqli_query($conn, $query);
   if(mysqli_fetch_array($run_query) > 0)
   {
     $_SESSION['user_session']=$email;
     ?>

          <script type="text/javascript">
            window.location.href="../mobile/home.php";
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
          $_SESSION['user_session']=$email;
          ?>

               <script type="text/javascript">
                 window.location.href="../mobile/home.php";
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

               <span id="pop_up_span"><img src="../icons/error.jpg" id="error_img_src"/>
                    Invalid Email
               </span>
          </body>
          </html>

      <?php
}
 ?>
