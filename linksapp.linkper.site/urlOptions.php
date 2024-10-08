<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();

}

$url=$_GET['u'];

 ?>

 <html>
 <head>
   <title>Linkper URL Options</title>
   <style>
   body{

  /*   background-image: url("icons/linkper.png");
     background-size:contain;
    */ background-color: grey;

   }
      #options_div{
          display: block;
          margin-left: 400px;
          margin-right: 400px;
          margin-top: 40px;
          border-radius: 7px;
          border-style: solid;
          border-color: #4682b4;
          
          font-family: sans-serif;
          font-size: 24px;
          z-index: 2;
          background-color: white;

      }

#title_div{
  margin-left: 0;
  margin-top: 0;
  margin-right: 0;
  height: 50px;
  text-align: center;
  background-color: #4682b4;
  border-style: none;
  border-radius: 0px 0px 0px 0px;

}

#back_home{
  text-decoration: none;
  float: right;

}
#whatsapp_share,#whatsapp_img{
  height: 40px;
  width: 40px;
  text-decoration: none;
  margin-top: 10px;
  margin-left: 10px;

}


#email_share,#email_img{
  height: 50px;
  width: 50px;
  text-decoration: none;
  margin-top: 10px;
  margin-left: 10px;

}
   </style>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="icons/linkper.png">
 </head>

 <body>
    <div id="options_div">
       <div id="title_div">BOOKMARK OPTIONS
           <a href="home.php" id="back_home">❌</a>
       </div>  </p> 
       NOTE: Features like Messenger may only work if you have messenger installed on your device. 
        <a href="whatsapp://send?text=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="whatsapp_share"><img src="icons/whatsapp.png" id="whatsapp_img"></a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="whatsapp_share"><img src="icons/facebook.png" id="whatsapp_img"></a>
        <a href="https://twitter.com/intent/tweet?text=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="whatsapp_share"><img src="icons/twitter.png" id="whatsapp_img"></a>
        <a href="mailto:?subject=Sharing-a-Link&body=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="email_share"><img src="icons/emailicon.png" id="email_img"></a>
        <a href="<?php echo $url; ?>" target="_blank" id="whatsapp_share"><img src="icons/browseicon.png" id="whatsapp_img"></a>
        <a href="fb-messenger://share/?link=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="whatsapp_share"><img src="icons/messenger.png" id="whatsapp_img"></a>
        <a href="https://t.me/share/url?url=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="mail_share"><img src="icons/telegram.jpg" id="email_img"></a>
        <a href="https://www.reddit.com/submit?title=Shared-Link&url=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="mail_share"><img src="icons/reddit.png" id="email_img"></a>
        <a href="sms:&body=<?php echo $url."       Sent from http://linkper.cc"; ?>" target="_blank" id="mail_share"><img src="icons/sms.jpg" id="email_img"></a>
        <a href="deleteUrl.php?u=<?php echo $url; ?>" id="mail_share"><img src="icons/deleteicon.png" id="email_img"></a>

    </div>
 </body>
 </html>
