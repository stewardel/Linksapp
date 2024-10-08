<?php
/*
    This file contains all the needed configurations
    such as database Name,table, paswords etc. NOTE: This
    comment has been made during development on a localhost
    server.

    Arthur: Steward Mwanza
    email: stewardmwanza28@gmail.com
    DATE: 22/05/20222
    PHP version 7.4.0
    DBMS: Mysql

*/

$server='localhost';
$username='linkper_root';
$password='D5f4PrAq[sdA';
$database='linkper_urls';

$conn=mysqli_connect($server,$username,$password,$database,"3306") or die("System Error: we're upgrading the system ".mysqli_error());

?>
