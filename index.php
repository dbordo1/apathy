<?php session_start();
include 'db.inc.php';
if(!$_SESSION['user']) {
  header("Location: login.php");
}
$user = $_SESSION['user'];
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

      <nav class="nav-extended blue lighten-1">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo"><img class="logo responsive-img" src="logo.png"></img></a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><h5>Hi, <?php echo $user['Name']; ?>!</h5></li>
          </ul>
        </div>
        <div class="nav-content">
          <ul class="tabs tabs-transparent">
            <li class="tab s12"><a class="active" href="#employees">Employees</a></li>
            <li class="tab s12"><a href="#products">Products</a></li>
            <li class="tab s12"><a href="#expenses">Expenses</a></li>
            <li class="tab s12"><a href="#invoices">Invoices</a></li>
            <li class="tab s12"><a href="#manufacturers">Manufacturers</a></li>
            <li class="tab s12"><a href="#advertising">Advertising</a></li>
            <li class="tab s12"><a href="#profit">Profit</a></li>
          </ul>
        </div>
      </nav>
      <div id="employees" class="col s12" style="margin: 45px; max-height: 100px;"><?php include 'employees.php'; ?></div>
      <div id="products" class="col s12" style="margin: 45px;"><?php include 'products.php'; ?></div>
      <div id="expenses" class="col s12" style="margin: 45px;"><?php include 'expenses.php'; ?></div>
      <div id="invoices" class="col s12" style="margin: 45px;"><?php include 'invoices.php'; ?></div>
      <div id="manufacturers" class="col s12" style="margin: 45px;"><?php include 'manufacturers.php'; ?></div>
      <div id="advertising" class="col s12" style="margin: 45px"><?php include 'advertising.php'; ?></div>
      <div id="profit" class="col s12" style="margin: 45px;"><?php include 'profit.php'; ?></div>
    </body>
  </html>
