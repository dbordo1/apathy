<?php
  include 'db.inc.php';
?>

<h1>Expenses</h1>

<table class="highlight">
  <thead>
    <tr>
      <th>Description</th>
      <th>Total Expenses</th>
    </tr>
  </thead>

  <tbody>
    <?php

      $queryDontAsk = "SELECT SUM(WholeSaleCost * Quantity) FROM Product WHERE DropNo = (SELECT DropID FROM dbordo1db.Drop WHERE Drop_Name = 'ask me nothing')";
      $resultDontAsk = mysql_query( $queryDontAsk,$connection);

      while ($row = mysql_fetch_array($resultDontAsk)) {
        $totalCost = round($row["SUM(WholeSaleCost * Quantity)"], 2);
        echo "<tr><td>ask me nothing</td>
        <td>\${$totalCost}</td>
        </tr>";
      }

      $queryPlease = "SELECT SUM(WholeSaleCost * Quantity) FROM Product WHERE DropNo = (SELECT DropID FROM dbordo1db.Drop WHERE Drop_Name = 'please don\'t notice me')";
      $resultPlease = mysql_query($queryPlease,$connection);

      while ($row = mysql_fetch_array($resultPlease)) {
        $totalCost = round($row["SUM(WholeSaleCost * Quantity)"], 2);
        echo "<tr><td>please don't notice me</td>
        <td>\${$totalCost}</td>
        </tr>";
      }

      $queryThisTime = "SELECT SUM(WholeSaleCost * Quantity) FROM Product WHERE DropNo = (SELECT DropID FROM dbordo1db.Drop WHERE Drop_Name = 'this time next year')";
      $resultThisTime = mysql_query($queryThisTime,$connection);

      while ($row = mysql_fetch_array($resultThisTime)) {
        $totalCost = round($row["SUM(WholeSaleCost * Quantity)"], 2);
        echo "<tr><td>this time next year</td>
        <td>\${$totalCost}</td>
        </tr>";
      }

      $queryWebsite = "SELECT SUM(AnnualCost) FROM dbordo1db.Website";
      $resultWebsite = mysql_query( $queryWebsite,$connection);

      while ($row = mysql_fetch_array($resultWebsite)) {
        echo "<tr><td>Website</td>
        <td>\${$row["SUM(AnnualCost)"]}</td>
        </tr>";
      }

      $queryTax = "SELECT (SUM(Price * Quantity_sold)) * 0.06 FROM dbordo1db.Sales, dbordo1db.Product WHERE Sales.ProdID = Product.ProdID";
      $resultTax = mysql_query( $queryTax,$connection);

      while ($row = mysql_fetch_array($resultTax)) {
        $totalCost = round($row["(SUM(Price * Quantity_sold)) * 0.06"], 2);
        echo "<tr><td>Taxes</td>
        <td>\${$totalCost}</td>
        </tr>";
      }

      $querySalary = "SELECT SUM(Salary) FROM Employee";
      $resultSalary = mysql_query($querySalary,$connection);

      while ($row = mysql_fetch_array($resultSalary)) {
        $totalCost = round($row["SUM(Salary)"], 2);
        echo "<tr><td>Employee Salaries</td>
        <td>\${$totalCost}</td>
        </tr>";
      }

    ?>
  </tbody>
</table>
