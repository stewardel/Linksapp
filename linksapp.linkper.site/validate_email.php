<?php

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
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
//NOTE left blank intentionally 
}
else {
      ?>
          <html>
          <head>
            <title></title>
          </head>
          <body>

               <span id="pop_up_span"><img src="icons/error.jpg" id="error_img_src"/>
                 This Email Address is not Valid
               </span>
          </body>
          </html>
      <?php
}
 ?>
