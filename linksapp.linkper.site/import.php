<?php 
header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
include "config.php";
$url=mysqli_real_escape_string($conn, $_POST['url']);
$url = strtok($url, "#");
$user=mysqli_real_escape_string($conn, $_POST['email']);
$subject=parse_url($url);
 if(!$subject['query'])
 {
     if(!$subject['path'])
     {
         $subject=$subject['host']; 
     }
     else
     {
         $subject=$subject['path']; 
     }
 }
else
{
    $subject=$subject['query']; 
}


if($url=="" || $subject=="")
{
  echo '<script>confirm("Fill in your Url and Subject");</script>';

}
else {
//insert the data in the linkstable
//before inserting, ensure that the same link does not exist
//in the table by the same user email.
$select_query="SELECT `url`,`user` FROM `linkstable` WHERE `user`='".$user."' AND `url`='".$url."'";
$run_select_query=mysqli_query($conn, $select_query);
if(mysqli_fetch_array($run_select_query)>0)
{
  //It means the user already has that url. Therefore,
  //No need to restore again to avoid duplications in the table.
  echo '<script>confirm("You already Saved this Bookmark");</script>';

}
else {

   $query="INSERT INTO `linkstable`(`url`,`subject`,`user`) VALUES('".$url."','".$subject."','".$user."')";
   $run=mysqli_query($conn, $query);
   if(!$run)
   {
     echo '<script>confirm("Not Saved Try Again");</script>'; 
   }
   else {
     echo '<script>confirm("Bookmark saved successfully");</script>';
     ?>
        <script>
            window.close(); 
        </script>
     <?php 

   }

 }
}

 
?>



