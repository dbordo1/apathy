<h1>Employees</h1>

<table class="highlight">
  <thead>
    <tr>
      <th>Name</th>
      <th>SSN</th>
      <th>DOB</th>
      <th>Start Date</th>
      <th>Address</th>
      <th>Salary</th>
      <th>Status</th>
      <th>Position</th>
    </tr>
  </thead>

  <tbody>
    <?php
      include 'db.inc.php';

      $query = "SELECT * FROM Employee";
      $result= mysql_query($query,$connection);

      while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo "<tr><td>{$row["Fname"]} {$row["Minit"]} {$row["Lname"]}</td>
        <td>{$row["SSN"]}</td>
        <td>{$row["DOB"]}</td>
        <td>{$row["StartDate"]}</td>
        <td>{$row["Street"]} {$row["City"]}, {$row["State"]}, {$row["ZipCode"]}</td>
        <td>\${$row["Salary"]}</td>
        <td>{$row["Status"]}</td>
        <td>{$row["Position"]}</td>
        </tr>";
      }
    ?>
  </tbody>
</table>
