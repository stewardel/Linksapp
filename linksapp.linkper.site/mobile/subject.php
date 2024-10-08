<?php
include "config.php";
$url=mysqli_real_escape_string($conn, $_POST['url']);

echo $url;

?>