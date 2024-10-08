<?php
/*
   22/05/2022
   this code displays the email textbox and button
   then it validates the email address everytime the user presses
   a key by using jquery.js Library.
   when the user presses the done button, the validation is
   performed then if its valid, the execution proceeds to
   a home page where the urls are displayed.

Author: Steward Mwanza
email: stewardmwanza28@gmail.com
PHP version: 7.4.0

*/

include "config.php";

?>

<html>
<head>
  <title>Linkper, Save and share bookmarks.</title>
<style>
    body{
        background-color: lightgrey;
        overflow: auto; 
    }
    
#welcome_span{
    position: absolute;
    display: block;
    margin-top: 130px; 
  position: inherit; 
  box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  background-color: white;
  text-align: center;
  overflow: auto;
  width: 440px;
  height: auto;
  margin-left: auto;
  margin-right: 150px;
  padding-bottom: 80px; 
  z-index: 20;
}

#welc{
  position: absolute;
  left: 3;
  border-radius: 10px;
  
  height: 300px;
  width: 470px;
  color: black;
  text-align: center;
  text-decoration-style: wavy;
  font-size: 30px;
  margin-top: 110px;
  overflow: auto;
  font-style: italic;
}

    #download_be{
        border-radius: 2px;
        border-style: none;
        text-align: center;
        margin-top: 10px;
        border-width: 2px; 
        margin-top: 10px; 
        margin-left: 10px; 
        height: 40px; 
        background-color: #28282B;
        background-image: url("../icons/download.png");
        background-position: left;
        background-repeat: no-repeat;
        background-size: 20px;
        text-indent: 14px; 
        
    }
    
    #aboutBtn
    {
        border-radius: 2px;
        border-style: none;
        text-align: center;
        border-width: 2px; 
        margin-top: 10px; 
        margin-left: 10px; 
        height: 40px; 
        background-color: #28282B;
        background-image: url("../icons/aboutpicture.png");
        background-position: left;
        background-repeat: no-repeat;
        background-size: 20px;
        text-indent: 14px; 
        
    }
    
 #ahref{
     text-decoration: none;
     margin-left: 5px;
     margin-right: 5px; 
     font-size: 13px; 
     color: white;
 }
 
 #topDiv
 {
     position: absolute;
     left: 0;
     right: 0;
     top: 0;
     margin: 0; 
     height: 50px;
     background-color: #28282B;
     width: 100%; 
 }
 
 #Team{
     
     color: white; 
     font-size: 15px; 
     margin-left: 10px; 
 }
 #DeveloperDetails{
  display: none;
  
}

#Team:hover + #DeveloperDetails {
  display: block;
  margin-left: 320px; 
  background-color: #28282B;
  color: white;
  width: 400px; 
  text-align: center; 
}
</style>
<link rel="shortcut icon" type="image/png" href="icons/linkper.png"/>
<link rel="stylesheet" href="css/style.css"/>
<meta name="description" content="Linkper, keep, share, find more.. The perfect place for bookmarks. You can access your links using any device.">
      <meta name="keywords" content="Linkper is a place or plartform for keeping, sharing and remotely accessing your bookmarks.. You can share to a link or bookmark to Whatsapp, twitter, facebook, email etc. Use any device. easy and reliable.">
      
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
    <script type="text/javascript">
    //width on tecno pop 5 pro=360. 
    // width on Galaxy A01=412
     //redirect any mobile device
     //to the directory.
     if(screen.width <= 490)
     {
        window.location.href="../mobile/"; 
         
     }
       // alert(screen.width); 
    </script>
    <div id="topDiv">
        <button id="download_be"><a href="Linkperext.rar" id="ahref">Download Browser Extension |</a></button>
        <button id="aboutBtn"><a href="about.html" id="ahref">About |</a></button>
        <label id="Team">System Developers |</label>
        <div id="DeveloperDetails">       
        <img src="icons/mypic.jpg" id="myimg" style="border-radius: 10px;height:70px; width: 70px; margin-left: 40px; margin-top: 20px;"></p> System Programmer<br><hr> 
            Steward Mwanza<br>
            +260972279664<br>
            stewardmwanza28@gmail.com
        </div>
    </div> 
       <!-- <button id="reportProblem" onclick="showForm();">Report a problem</button>--> 

      <div id="welc">
      Keep, search, share and remotely access your bookmarks. <br>
      You can also find links about other websites and pages by clicking on More Links in the menu
      </div> 
  <div id="welcome_span">
      <img src="icons/linkper.png" id="icon_img_src"/>
      <input type="email" placeholder="Your email here" id="email_input_box" autocomplete="off">
      <span id="note"></span>
      <input type="submit" value="DONE" id="go_btn" onclick="login_func();">
 </div>
 
</body>
</html>

<script>

var savedEmail=localStorage.getItem("linkperEmail");
    document.getElementById('email_input_box').value=savedEmail; 


     function validate_email_func()
     {
       var email = $('#email_input_box').val();
          $.post('validate_email.php',{email:email},function(data){
            $('#note').html(data)
          });
     }

     function login_func()
     {
       var email=$('#email_input_box').val();
       localStorage.setItem("linkperEmail",email); 
       $.post('login.php',{email:email},function(data){
         $('#note').html(data)
       });
     }
     
     
    
</script>
