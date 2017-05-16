<?php
  include 'db.inc.php';

  $yearSales = array();
  $dropSales = array();

  $query2016 = "SELECT (SUM(Quantity_sold * Price))/12 FROM Sales, Product WHERE Sales.ProdID = Product.ProdID AND Date LIKE '2016%'";
  $result2016 = mysql_query($query2016,$connection);

  while ($row = mysql_fetch_array($result2016)) {
    array_push($yearSales, round($row["(SUM(Quantity_sold * Price))/12"], 2));
  }

  $query2017 = "SELECT (SUM(Quantity_sold * Price))/12 FROM Sales, Product WHERE Sales.ProdID = Product.ProdID AND Date LIKE '2017%'";
  $result2017 = mysql_query($query2017,$connection);

  while ($row = mysql_fetch_array($result2017)) {
    array_push($yearSales, round($row["(SUM(Quantity_sold * Price))/12"], 2));
  }

  $queryAskMe = "SELECT SUM(Quantity_sold * Price) FROM Sales, Product WHERE Sales.ProdID = Product.ProdID AND DropNo = (SELECT DropID FROM dbordo1db.Drop WHERE Drop_Name = 'ask me nothing')";
  $resultAskMe = mysql_query($queryAskMe,$connection);

  while ($row = mysql_fetch_array($resultAskMe)) {
    array_push($dropSales, round($row["SUM(Quantity_sold * Price)"], 2));
  }

  $queryPlease = "SELECT SUM(Quantity_sold * Price) FROM Sales, Product WHERE Sales.ProdID = Product.ProdID AND DropNo = (SELECT DropID FROM dbordo1db.Drop WHERE Drop_Name = 'please don\'t notice me')";
  $resultPlease = mysql_query($queryPlease,$connection);

  while ($row = mysql_fetch_array($resultPlease)) {
    array_push($dropSales, round($row["SUM(Quantity_sold * Price)"], 2));
  }

  $queryThisTime = "SELECT SUM(Quantity_sold * Price) FROM Sales, Product WHERE Sales.ProdID = Product.ProdID AND DropNo = (SELECT DropID FROM dbordo1db.Drop WHERE Drop_Name = 'this time next year')";
  $resultThisTime = mysql_query($queryThisTime,$connection);

  while ($row = mysql_fetch_array($resultThisTime)) {
    array_push($dropSales, round($row["SUM(Quantity_sold * Price)"], 2));
  }


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

<h1>Profit by Year</h1>

<canvas id="yearChart"></canvas>

<h1>Profit by Drop</h1>
<canvas id="dropChart"></canvas>

<script type="text/javascript">
var ctx2 = document.getElementById("dropChart");
var ctx = document.getElementById("yearChart");
  var yearData = {
    labels: ["2016", "2017"],
    datasets: [
        {
            label: "Total Sales",
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
              'rgba(100,99,132,1)',
              'rgba(100,99,132,1)',
            ],
            'width':50,
            'height':50,
            borderWidth: 1,
            data: <?=json_encode($yearSales);?>
        },
    ]
  };
  var dropData = {
    labels: ["ask me nothing", "please don\'t notice me", "this time next year"],
    datasets: [
        {
            label: "Total Sales",
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
              'rgba(100,99,132,1)',
              'rgba(100,99,132,1)',
              'rgba(100,99,132,1)',
            ],
            'width':50,
            'height':50,
            borderWidth: 1,
            data: <?=json_encode($dropSales);?>
        },
    ]
  };
  var yearChart = new Chart(ctx, {
    type: 'bar',
    data: yearData
  });
  var dropChart = new Chart(ctx2, {
    type: 'bar',
    data: dropData
  });
</script>
