<?php
  include 'db.inc.php';

  $advertisers = array();
  $clickCounts = array();
  $revenue = array();

  $query = "SELECT Advertiser_Name, Click_Count, SUM(Amount_Paid) FROM Advertiser, Advertisement WHERE Advertiser_ID = Advert_ID GROUP BY Advertiser_Name";
  $result= mysql_query($query,$connection);

  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    array_push($advertisers, $row["Advertiser_Name"]);
    array_push($clickCounts, $row["Click_Count"]);
    array_push($revenue, $row["SUM(Amount_Paid)"]);
  }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>

<h1>Advertising</h1>

<canvas id="chart"></canvas>

<script type="text/javascript">
var ctx = document.getElementById("chart");
  var data = {
    labels: <?=json_encode($advertisers);?>,
    datasets: [
        {
            label: "Click Count",
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
            borderWidth: 1,
            data: <?=json_encode($clickCounts);?>,
        },
        {
            label: "Revenue",
            backgroundColor: [
                'rgba(100, 99, 132, 0.2)',
                'rgba(100, 99, 132, 0.2)',
                'rgba(100, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(100,99,132,1)',
                'rgba(100,99,132,1)',
                'rgba(100,99,132,1)',
            ],
            'width':50,
            'height':50,
            borderWidth: 1,
            data: <?=json_encode($revenue);?>,
        }
    ]
  };
  var chart = new Chart(ctx, {
    type: 'bar',
    data: data
  });
</script>
