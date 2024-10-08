<?php
/*
   22/05/2022
   this code displays the email textbox and button
   then it validates the email address everytime the user presses
   a key by using jquery.js Library.
   when the user presses the done button, the validation is
   performed then if its valid, the execution proceeds to
   a home page where the urls are displayed.

Arthur: Steward Mwanza
email: stewardmwanza28@gmail.com
PHP version: 7.4.0

*/

include "config.php";
?>

<html>
<head>
  <title>Linkper, Save and share bookmarks.</title>
<style>
     
#icon_img_src{
  position: inherit;
  display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;
    margin-top: 80px;

}

#email_input_box{
    position: inherit;
  display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 40px; 
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
  position: inherit;
  margin-top: 30px; 
  
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
  background-color: #28282B;
  color: white;
 z-index: 1;
  text-align: center; 
}


</style>
<link rel="shortcut icon" type="image/png" href="../icons/linkper.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
   <div id="topDiv">
        
        <button id="aboutBtn"><a href="../about.html" id="ahref">About |</a></button>
        <label id="Team">System Developers |</label>
        <div id="DeveloperDetails">       
        <img src="../icons/mypic.jpg" id="myimg" style="border-radius: 10px;height:70px; width: 70px; margin-left: 15px; margin-top: 20px;"></p> System Programmer<br><hr> 
            Steward Mwanza<br>
            +260972279664<br>
            stewardmwanza28@gmail.com
        </div>
    </div> 
  <!-- --> 
      <img src="../icons/linkper.png" id="icon_img_src"/>
      </p> 
       <div id="welcome_span">
      Keep, search,
     share and remotely access your bookmarks or web links. You can also find links about other things by clicking on More Links in the menu
  </div>
  </p><br> 
      <input type="email" placeholder="Your email here" id="email_input_box" autocomplete="off">
      <span id="note"></span>
      <input type="submit" value="DONE" id="go_btn" onclick="login_func();">
    <!--<img src="../icons/people.png" id="people_img_src"/>
     --> 
</body>
</html>


<script>
    var savedEmail=localStorage.getItem("linkperEmail");
    document.getElementById('email_input_box').value=savedEmail; 

     function validate_email_func()
     {
       var email = $('#email_input_box').val();
          $.post('/mobile/validate_email.php',{email:email},function(data){
            $('#note').html(data)
          });
     }

     function login_func()
     {
       var email=$('#email_input_box').val();
              localStorage.setItem("linkperEmail",email); 
       $.post('/mobile/login.php',{email:email},function(data){
         $('#note').html(data)
       });
     }
</script>
