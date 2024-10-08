<?php
session_start();
/*
   26/05/2022
   This code selects the rows whose user is the one logged in($_SESSION['user_session'])
   it must select the rows based on what the user has specified it the
   filter select element under home.php file.
   when the rows are found, it should able to display them with
   the options icon. it should count the number of urls, if the number
   is less than 1 then display a message showing there are no urls saved.

Author: Steward Mwanza
email: stewardmwanza28@gmail.com
PHP version: 7.4.0

*/


if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();
}

include "config.php";  
$search_key=mysqli_real_escape_string($conn, $_POST['search_key']);
$filter_key=mysqli_real_escape_string($conn, $_POST['filter_key']);
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

   </body>
   </html>
<?php

if($filter_key=="Filter")
{
   $select_urls="SELECT * FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' AND `url` LIKE '%$search_key%' OR `subject` LIKE '%$search_key%' AND `user`='".$_SESSION['user_session']."'";
    $run_select_urls=mysqli_query($conn, $select_urls);
    if(mysqli_num_rows($run_select_urls)<1)
    {
      echo "Not Found";
    }
    else {
      while ($fetched=mysqli_fetch_array($run_select_urls))
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
    }
}
else
{
   if($filter_key=="Subject")
     {

          $select_urls="SELECT * FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' AND `subject` LIKE '%$search_key%'";
           $run_select_urls=mysqli_query($conn, $select_urls);
           if(mysqli_num_rows($run_select_urls)<1)
           {
             echo "Nothing Found";
           }
           else {
             while ($fetched=mysqli_fetch_array($run_select_urls))
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
           }

     }
     else
     {
         if($filter_key=="Url")
         {

              $select_urls="SELECT * FROM `linkstable` WHERE `user`='".$_SESSION['user_session']."' AND `url` LIKE '%$search_key%'";
               $run_select_urls=mysqli_query($conn, $select_urls);
               if(mysqli_num_rows($run_select_urls)<1)
               {
                 echo "Nothing Found";
               }
               else {
                 while ($fetched=mysqli_fetch_array($run_select_urls))
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
               }

         }
     }
}
?>
