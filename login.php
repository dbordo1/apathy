<?php session_start();
if($_SESSION['user']) {
  header("Location: index.php");
}
?>

<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <!--Import custom styles-->
    <link rel="stylesheet" href="main.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    <img class="logo responsive-img" style="width: 150px;" src="logo.png"></img>
    <div class="row">
      <form class="col s12" style="width: 75%" method="post" action="loginScript.php">
        <div class="row">
          <div class="input-field col s12">
            <input id="email" name="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" name="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Login
          <i class="material-icons right">send</i>
        </button>
      </form>
    </div>
  </body>
</html>
