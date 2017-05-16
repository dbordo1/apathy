<?php
  include 'db.inc.php';

  $names = array();
  $costs = array();

  $query = "SELECT Man_ID, Man_Name, SUM(amount) FROM bills, Manufacturer WHERE bills.ManID = Manufacturer.Man_ID GROUP BY MAN_ID ORDER BY MAN_ID";
  $result= mysql_query($query,$connection);

  while ($row = mysql_fetch_array($result)) {
    array_push($names, $row["Man_Name"]);
    array_push($costs, $row["SUM(amount)"]);
  }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

<h1>Manufacturers</h1>

<canvas id="manChart"></canvas>

<script type="text/javascript">
var ctx = document.getElementById("manChart");
  var data = {
    labels: <?=json_encode($names);?>,
    datasets: [
        {
            label: "Cost",
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
              'rgba(100,99,132,1)',
              'rgba(100,99,132,1)',
              'rgba(100,99,132,1)',
              'rgba(100,99,132,1)',
            ],
            'width':50,
            'height':50,
            borderWidth: 1,
            data: <?=json_encode($costs);?>,
        }
    ]
  };
  var chart = new Chart(ctx, {
    type: 'bar',
    data: data
  });
</script>
