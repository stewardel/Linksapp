<?php
/*
   23/05/2022
   This file / code is responsible for creating the user interface
for the url, subject and save elements. It uses jquery to post the
url and subject to the saveUrl.php file which then inserts the data
if none of the variables is null or empty. The css has been declared
in the home.css file under css Directory.
Arthur: Steward Mwanza
email: stewardmwanza28@gmail.com
PHP version: 7.4.0

*/

if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();
}


?>
<html>
<head>
  <title></title>

  <style>

  </style>
  <link rel="shortcut icon" type="image/png" href="icons/linkper.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript" src="jquery.js"></script>
</head>

<body>
   <input type="text" id="addUrl_text" placeholder="Your URL" onpaste="processSubject();" onkeydown="processSubject();" onkeyup="processSubject();"/>
   <input type="text" id="addsubject_text" placeholder="Your URL Subject"/>
   <input type="submit" id="save_url_btn" value="SAVE NOW" onclick="save_url_func();"/>
   
</body>
</html>


<script type="text/javascript">

    function save_url_func()
    {
      var url=$('#addUrl_text').val();
      var subject=$('#addsubject_text').val();
      $.post('/mobile/saveUrl.php',{url:url, subject:subject},function(data){
        $('#prompt').html(data)
      });

      document.getElementById('addUrl_text').value="";
      document.getElementById('addsubject_text').value="";
      
    }
    
    
       
      (async function paste(){
    const permission = await navigator.permissions.query({ name: 'clipboard-read',allowRead:true});
        if (permission.state === 'denied') {
          throw new Error("Not allowed");
        }
        else {
          let paste = await navigator.clipboard.readText();
          document.getElementById('addUrl_text').value=paste; 
        }
})();


function processSubject()
{
 
         var url=$('#addUrl_text').val();
          let domain = (new URL(url));
          domain = domain.hostname + " # " + domain.pathname;
          document.getElementById('addsubject_text').value=domain; 
          
}
  
</script>
