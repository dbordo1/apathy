<?php
$hostName = "localhost:/usr/cis/var/triton.sock";
//$hostName = "triton.towson.edu:3360";
$databaseName = "dbordo1db";
$username = "dbordo1";
$password = "Cosc*8d7m";

$connection = mysql_connect($hostName,$username,$password)
or die("Could not connect: ".mysql_error());

mysql_select_db('dbordo1db')
or die("Error in selecting the database:".mysql_error());

if (!$connection) {
    die('Could not connect: ' . mysql_error());
}
?>
