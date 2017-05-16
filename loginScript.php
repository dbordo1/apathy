<?php
session_start();

include 'db.inc.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM Users WHERE email ='$email' AND password ='$password'", $connection);
if (!$query)
{
    die(mysql_error($connection));
}
$numrows = mysql_num_rows($query);

if($numrows === 1) {
  $user = mysql_fetch_assoc($query);
  $_SESSION['user'] = $user;
  header("Location: index.php");
} else {
  header("Location: login.php");
}

?>
