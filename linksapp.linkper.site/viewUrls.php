<?php
session_start();

if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit(); 
}

include "config.php";
$query="SELECT * FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' ORDER BY `date_inserted` DESC";
$run_query=mysqli_query($conn, $query);
$counted=mysqli_num_rows($run_query);
if($counted<1)
{
  echo "You do not have any saved Bookmark. ";
}
else
{
?>

<html>
<head>
  <title></title>
<style>

</style>
<link rel="shortcut icon" type="image/png" href="icons/linkper.png"/>
<link rel="stylesheet" href="css/viewUrls.css"/>
<script type="text/javascript" src="jquery.js"></script>

</head>
<body>
<?php

   while ($fetched=mysqli_fetch_array($run_query))
    {

           ?>
           <span id="url_span" class="url_span" title="<?php echo $fetched['url']; ?>">
             <img src="http://www.google.com/s2/favicons?domain=<?php echo $fetched['url']; ?>" id="domain_image_src">
             <a href="urlOptions.php?u=<?php echo $fetched['url']; ?>" title="Options: Browse, share, Delete, etc" id="options">°°°</a>
       </p>
     <p>
   </p><br>
       <div id="show_url">
           <?php echo $fetched['url']; ?>
       </div>
     </p>
       <span id="subject_url">
           <?php echo $fetched['subject']; ?>
       </span>
       <br>
       <span id="url_date">
           <?php
               echo "🕒 ".$fetched['date_inserted'];
           ?>
       </span>
   </span>

           <?php

    }

?>
</body>
</html>

<?php
}
?>
