<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
   header('Location: index.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		
		#label{
			font-family: sans-serif;
			font-size: 14px; 

		}
		#changeEmailSpan{
			font-family: sans-serif;
			font-size: 12px;

		}

		#newEmail{

  height: 28px;
  width: 300px;
  border-radius: 6px;
  border-style: solid;
  box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.1);
  text-align: center;

		}

		#changeEmail{
			background-color: #1e90ff;
color: white;
height: 27px;
border-radius: 6px;
border-style: none;
		}
		

	</style>
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
	
	<label for="changeEmailSpan" id="label">Change Email</label><br>
	<div id="changeEmailSpan"> 
		Incase you change your address again, you can always change back. <br> 
	    <input type="text" id="newEmail" placeholder="New email"><input type="submit" id="changeEmail" value="Change Email" onclick="changeEmail_func();"><br>
	    <span id="msg" style="color: red;"></span>
    </div>
    
   
</body>
</html>

<script type="text/javascript">
	
	function changeEmail_func()
	{
      
   var newEmail=$('#newEmail').val();
  $.post('changeEmail.php',{newEmail:newEmail},function(data){
   $('#msg').html(data)
  });

	}
	
</script>