<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();
}
include "config.php";
$key=mysqli_real_escape_string($conn, $_POST['key']);
$query="SELECT * FROM `linkstable` WHERE `url` LIKE '%$key%' OR `subject` LIKE '%$key%'";
$run_query=mysqli_query($conn, $query);

   while ($fetched=mysqli_fetch_array($run_query))
    {

           ?>
           <span id="url_span" class="url_span" title="<?php echo $fetched['url']; ?>">
             <img src="http://www.google.com/s2/favicons?domain=<?php echo $fetched['url']; ?>" id="domain_image_src">
             <a href="ext_urlOptions.php?u=<?php echo $fetched['url']; ?>" title="Options: Browse, share, Delete, etc" id="options">°°°</a>
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
