<h1>Invoices</h1>

<table class="highlight">
  <thead>
    <tr>
      <th>Amount</th>
      <th>Date</th>
      <th>Manufacturer</th>
    </tr>
  </thead>

  <tbody>
    <?php
      include 'db.inc.php';

      $billQuery = "SELECT * FROM bills";
      $billResult = mysql_query($billQuery,$connection);

      while ($row = mysql_fetch_array($billResult)) {
        $manQuery = "SELECT Man_Name FROM Manufacturer WHERE Man_ID =" . $row["ManID"];
        $manResult = mysql_query($manQuery,$connection);
        $manRow = mysql_fetch_array($manResult);

        echo "<tr><td>\${$row["Amount"]}</td>
        <td>{$row["Date"]}</td>
        <td>{$manRow["Man_Name"]}</td>
        </tr>";
      }
    ?>
  </tbody>
</table>
