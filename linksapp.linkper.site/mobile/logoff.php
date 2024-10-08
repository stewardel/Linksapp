<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('Location: index.php');
  exit();

}

session_start();
session_unset();
session_destroy();
?>

<script>
  window.location.replace("index.php");
</script>
