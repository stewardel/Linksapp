<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();
}

?>

<html>
<head>
  <title>Other Links</title>
  <style>

  </style>
  <link rel="shortcut icon" type="image/png" href="icons/linkper.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/external.css"/>
  <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
  <header>
    <input type="text" placeholder="Search Links on Linkper" id="external_search" onkeyup="search();"> <input type="checkbox" id="useGoogle" value="search">
  <label for="useGoogle"> Search on Google</label> 

  </header>
    <div id="external_display_div">
      
     </div>
</body>
</html>

<script type="text/javascript">

document.getElementById('useGoogle').onclick = function() {
    var Gsearch=document.getElementById("external_search").value; 
    window.open('http://www.google.com/search?q='+Gsearch);
    
};


    function search()
    {
      var key=$('#external_search').val();
      $.post('get_externalUrls.php',{key:key},function(data){
        $('#external_display_div').html(data)
      });
    }
    
    //use an IIFE to immediately
    //display the links without clicking on the buttons.
    (function autoSearch()
    {
      var key=$('#external_search').val();
      $.post('get_externalUrls.php',{key:key},function(data){
        $('#external_display_div').html(data)
      });
    })();
    
</script>
