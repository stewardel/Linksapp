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

 ?>

<html>
<head>
  <title>Linkper Home</title>
<link rel="shortcut icon" type="image/png" href="../icons/linkper.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#main_display_div
{
position: relative;
margin-left: 5px;
margin-right: 5px;
margin-top: 20px;
height: 80%;
overflow: auto;
padding-bottom: 10px;
/*box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
border-radius: 7px;*/
}

#home_add_btn{

  background-color: #1e90ff;
background-image: url("../icons/add2.png");
background-position: 2px;
background-size: 25px;
background-repeat: no-repeat;
font-size: 15px;
color: white;
width: 100%;
height: 25px;
text-indent: 30px;
border-style: none;
text-align: left;
}

#home_external_btn{
  
  background-color: #1e90ff;
background-image: url("../icons/more.png");
background-position: 2px;
background-size: 19px;
background-repeat: no-repeat;
font-size: 15px;
color: white;
width: 100%;
height: 25px;
text-indent: 30px;
border-style: none;
text-align: left;
}

#home_check_btn{
  background-color: #1e90ff;
	background-image: url("../icons/checkdata.png");
	background-position: 2px;
	background-size: 25px;
	background-repeat: no-repeat;
font-size: 15px;
color: white;
width: 100%;
height: 25px;
text-indent: 30px;
border-style: none;
text-align: left;
}

#home_urlNumber_span{
    position: absolute;
    left: 12;
    top: 6;
		color: white;
	font-size: 13px; 
border-radius: 6px;
border-style: none;
position: fixed;
text-align: center;
font-family: sans-serif;
}

#home_search_box{
	position: inherit;
	display: inline-block;
	background-image: url("../icons/filter.png");
	background-position: 5px;
	background-size: 17px;
	background-repeat: no-repeat;
	height: 15px;
	text-align: center;
	border-style: none; 
  border-radius: 6px;
  
}

#home_select_filter{
  position: inherit;
  display: inline-block;
  height: 15px;
  border-style: none;
  color: black;
  border-radius: 6px;
  border-style: none; 
  background-color: white;

}

#home_exit_btn{
 
  color: crimson;
  border-style: none;
  background-color: #1e90ff;
  padding-left: 1px;
  padding-right: 15px;
  font-size: 15px;
width: 100%;
height: 25px;
text-indent: 5px;
border-style: none;
text-align: left;

}

#home_deleteAll_btn{
 
	background-color: #1e90ff;
     background-image: url("../icons/deleteicon.png");
	background-position: 1px;
	background-size: 25px;
	background-repeat: no-repeat;
color: white; 
width: 100%;
height: 25px;
text-indent: 30px;
border-style: none;
text-align: left;

}



#addUrl_text{
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 100px;
  height: 35px;
  width: 300px;
  border-radius: 6px;
  border-style: none;
  box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.1);
  text-align: center;

}

#addsubject_text{
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 30px;
  height: 35px;
  width: 300px;
  border-radius: 6px;
  border-style: none;
  box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.1);
  text-align: center;

}


#save_url_btn{
  display: block;
  margin-left: auto;
  margin-right: auto;
  border-radius: 6px;
  height: 35px;
  border-style: none;
  color: white;
  width: 100px;
  background-color: #1e90ff;
  margin-top: 30px;
}





.mobile-container {

  background-color: #1e90ff;
  color: white;
  border-radius: 7px; 
}

.topnav {
  overflow: hidden;
  background-color: #1e90ff;
  position: relative;
  border-radius: 7px; 
  
}

.topnav #myLinks {
  display: none;
 
}

.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: #1e90ff;
  color: white;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}


#accountOptions{
 display: block;
  background-color: #1e90ff;
background-image: url("https://www.iconpacks.net/icons/1/free-user-group-icon-296-thumb.png");
background-position: 5px;
background-size: 22px;
background-repeat: no-repeat;

color: white;
height: 35px;
width: 35%; 
border-style: none;
margin-left: 2px;
text-indent: 27px; 

}


</style>
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>



<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#home" class="active"><span id="home_urlNumber_span">#</span>
  
   <input type="text" placeholder="Search" id="home_search_box" onkeyup="searchUrl_func();">
      <select id="home_select_filter" onclick="searchUrl_func();">
           <option>Filter</option>
           <option>Subject</option>
           <option>Url</option>
      </select>
  </a>
  <div id="myLinks">
    <br><hr> 
  <input type="submit" value="add" id="home_add_btn" onclick="add_func();"/><hr>
  <input type="submit" value="view" id="home_check_btn" onclick="viewUrls_func();"/><hr>
  <input type="submit" value="more" id="home_external_btn" onclick="external_func();"/><hr>
  <input type="submit" value="Delete all" title="Delete all your URLs" id="home_deleteAll_btn" onclick="deleteAll_func();"/><hr>
<!--  <input type="submit" value="❌Quit" title="Quit Linkper and close page" id="home_exit_btn"
  onclick="logoff_func();"/>-->
   <select id="accountOptions" onchange="logoff_func();">
        <option value="My Account">My Account</option>
        <option value="email"><?php echo $_SESSION['user_session']; ?></option>
        <option value="settings" id="settings" onclick="settings_func();">Settings</option>
        <option value="Log out">Log out</option>
    </select>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!-- End smartphone / tablet look -->
</div>


     


       <div id="main_display_div">

       </div>

  
<span id="prompt"></span>
</body>
</html>


<script>
function logoff_func()
   {
        var key = document.getElementById("accountOptions").value;
         if(key=="Log out")
         {
               $.get('/mobile/logoff.php',function(data){
                 $('#home_urlNumber_span').html(data)
                 });
         }
         
         if(key=="settings")
         {
             settings_func(); 
         }
    

   }
/*
   function logoff_func()
   {
     $.get('/mobile/logoff.php',function(data){
       $('#home_urlNumber_span').html(data)
     });

   }
*/ 

function deleteAll_func()
{
  var state=confirm("Are you sure to delete all your bookmarks?");
  if(state==true)
  {
     var state2=confirm("Proceed and Delete? You will loose all your bookmarks");
     if(state2==true)
     {
         $.get('/mobile/delete_all_urls.php',function(data){
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
  $.get('/mobile/add_url_userInterface.php',function(data){
    $('#main_display_div').html(data)
  });
}

function viewUrls_func()
{
  $.get('/mobile/viewUrls.php',function(data){
    $('#main_display_div').html(data)
  });


//get the file which counts the number of
//existsing bookmarks and display that value
// in the url_number_span element
//which is the home.php file
$.get('/mobile/countUrlsForUser.php',function(data){
  $('#home_urlNumber_span').html(data)
});

}

//get the file which counts the number of
//existsing bookmarks and display that value
// in the url_number_span element
//which is the home.php file
$.get('/mobile/countUrlsForUser.php',function(data){
  $('#home_urlNumber_span').html(data)
});

function searchUrl_func()
{
  var search_key=$('#home_search_box').val();
  var filter_key=$('#home_select_filter').val();

  $.post('/mobile/search_url.php',{search_key:search_key,filter_key:filter_key},function(data){
    $('#main_display_div').html(data)
  });
}

function external_func()
{
   window.location.href="/mobile/external.php";
}


(function viewUrls_func()
{
  $.get('/mobile/viewUrls.php',function(data){
    $('#main_display_div').html(data)
  });
})();




function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}


function settings_func()
{
  $.get('/mobile/settings.php',function(data){
   $('#main_display_div').html(data)
  });
}



</script>
