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
          #external_search{
              display: block;
              position: inherit;
              margin-left: 10px;
              margin-right: 10px;
              text-align: center;
              height: 28px;
              width: 90%;
              border-radius: 7px;
              border-style: solid;
              border-color: #1e90ff;
              
          } 
#url_span{
    position: inherit;
    height: 180px;
    width: 95%;
    border-radius: 7px;
    background-color: white;
    margin-left: 5px;
    margin-right: 5px;
    margin-top: 10px;
    box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2);
    display: inline-block;
    overflow-y: auto;
    overflow-x: hidden;
    font-family: sans-serif;
    font-size: 15px;
}


#domain_image_src{
   border-radius: 2px;
    height: 30px;
    width: 20px;
    margin-left: 5px;
    margin-top: 5px;
    margin-bottom: 10px;
   float: left;
}

#subject_url{
  margin-top: 10px;
}


#options{
  float: right;
  text-decoration: none;
  font-size: 24px;
  margin-top: 10px;
  margin-right: 5px;
  color: black;
}

#subject_url,#url_date{
  margin-left: 15px;
}


  </style>
  <link rel="shortcut icon" type="image/png" href="../icons/linkper.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script type="text/javascript" src="jquery.js"></script>
</head>
<body>
  <header>
    <input type="text" placeholder="Search URL or URL Subject" id="external_search" onkeyup="search();"><input type="checkbox" id="useGoogle" value="search">
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
      $.post('/mobile/get_externalUrls.php',{key:key},function(data){
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
