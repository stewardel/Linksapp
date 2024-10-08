<?php
/*
   23/05/2022
   This file uses home.css for stylesheet. All the neccessary buttons
   for adding, viewing, deleting, log off, more links are created in
   this file in html.
Author: Steward Mwanza
email: stewardmwanza28@gmail.com
PHP version: 7.4.0

*/
session_start(); 
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit;
}

if(!isset($_SESSION['user_session']) || empty($_SESSION['user_session']) || $_SESSION['user_session']=="")
{
  header('Location: index.php');
  exit;
}


include "config.php";
 ?>

<html>
<head>
  <title>Linkper Home</title>
<link rel="shortcut icon" type="image/png" href="icons/linkper.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/home.css"/>
<style>
#main_display_div
{
position: relative;
margin-left: 170px;
margin-right: 2px;
margin-top: 30px;
height: 80%;
overflow: auto;
padding-bottom: 10px;

/*box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
border-radius: 7px;*/
}


#image_src{
   border-radius: 6px;
    height: 20px;
    width: 20px;
    margin-left: 3px;
    margin-top: 5px;
  
}

#settings{
 display: block;
  background-color: #4682b4;
background-image: url("../icons/settings.png");
background-position: 5px;
background-size: 18px;
background-repeat: no-repeat;

color: white;
width: 130px;
height: 30px;
border-style: none;
position: fixed;
margin-left: 10px;
margin-top: 45px;
text-indent: -2px;

}


#accountOptions{
 display: block;
  background-color: #4682b4;
background-image: url("https://www.iconpacks.net/icons/1/free-user-group-icon-296-thumb.png");
background-position: 5px;
background-size: 22px;
background-repeat: no-repeat;

color: white;
width: 125px;
height: 30px;
border-style: none;
position: fixed;
margin-left: 10px;
margin-top: 80px;
text-indent: 27px; 

}
</style>
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>

<div id="home_buttons_div">
 <span id="home_urlNumber_span">#</span>
  <input type="submit" value="Add" id="home_add_btn" onclick="add_func();"/>
  <input type="submit" value="View Links" id="home_check_btn" onclick="viewUrls_func();"/>
  <input type="submit" value="More Links" id="home_external_btn" onclick="external_func();"/>
    <input type="submit" id="settings" value="Settings" onclick="settings_func();">
    <select id="accountOptions" onchange="logoff_func();">
        <option value="My Account">My Account</option>
        <option value="email"><?php echo $_SESSION['user_session']; ?></option>
        <option value="Log out">Log out</option>
    </select>

  <div id="suggestionsSpan">
      <p id="suggestionsParagraph">Suggestions<br></p> 
      No suggestions
      
         
         
  </div>
    <input type="submit" value="❌ Delete All" title="Delete all your URLs" id="home_deleteAll_btn" onclick="deleteAll_func();"/>
</div>
    <span id="home_search_span">
      <input type="text" placeholder="Search" id="home_search_box" onkeyup="searchUrl_func();">
      <select id="home_select_filter" onclick="searchUrl_func();">
           <option>Filter</option>
           <option>Subject</option>
           <option>Url</option>
      </select>
    </span>
<hr style="size: 1px; background-color: #4682b4"> 
       <div id="main_display_div">

       </div>
  <label id="emailLabel"><?php  echo $_SESSION['user_session']; ?></label>
<span id="prompt"></span>
</body>
</html>


<script>
   function logoff_func()
   {
        var key = document.getElementById("accountOptions").value;
         if(key=="Log out")
         {
               $.get('logoff.php',function(data){
                 $('#home_urlNumber_span').html(data)
                 });
         }
    

   }


function deleteAll_func()
{
  var state=confirm("Are you sure to delete all your bookmarks?");
  if(state==true)
  {
     var state2=confirm("Proceed and Delete? You will loose all your bookmarks");
     if(state2==true)
     {
         $.get('delete_all_urls.php',function(data){
           $('#prompt').html(data)
         });

     }
     else {

     }
  }
  else {

  }
}



function add_func()
{
  $.get('add_url_userInterface.php',function(data){
    $('#main_display_div').html(data)
  });
}

function viewUrls_func()
{
  $.get('viewUrls.php',function(data){
    $('#main_display_div').html(data)
  });


//get the file which counts the number of
//existsing bookmarks and display that value
// in the url_number_span element
//which is the home.php file
$.get('countUrlsForUser.php',function(data){
  $('#home_urlNumber_span').html(data)
});

}


//get the file which counts the number of
//existsing bookmarks and display that value
// in the url_number_span element
//which is the home.php file
$.get('countUrlsForUser.php',function(data){
  $('#home_urlNumber_span').html(data)
});



function searchUrl_func()
{
  var search_key=$('#home_search_box').val();
  var filter_key=$('#home_select_filter').val();

  $.post('search_url.php',{search_key:search_key,filter_key:filter_key},function(data){
    $('#main_display_div').html(data)
  });
}

function external_func()
{
   window.open("external.php");
}



(function viewUrlsAtStart()
{
  $.get('viewUrls.php',function(data){
    $('#main_display_div').html(data)
  });


//get the file which counts the number of
//existsing bookmarks and display that value
// in the url_number_span element
//which is the home.php file
$.get('countUrlsForUser.php',function(data){
  $('#home_urlNumber_span').html(data)
});

})(); 


function settings_func()
{
  $.get('settings.php',function(data){
   $('#main_display_div').html(data)
  });
}

</script>

