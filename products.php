<h1>Products</h1>

<table class="highlight">
  <thead>
    <tr>
      <th>Name</th>
      <th>Type</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Wholesale Cost</th>
    </tr>
  </thead>

  <tbody>
    <?php
      include 'db.inc.php';

      $query = "SELECT * FROM Product";
      $result= mysql_query( $query,$connection);

      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr><td>{$row["ProductName"]}</td>
        <td>{$row["Type"]}</td>
        <td>{$row["Quantity"]}</td>
        <td>\${$row["Price"]}</td>
        <td>\${$row["WholeSaleCost"]}</td>
        </tr>";
      }
    ?>
  </tbody>
</table>
