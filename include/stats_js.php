	<script type="text/javascript">

    google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
	  // Unique players
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Amount of people on'],
		  <?php echo $uniqueplayers; ?>
        ]);

        var options = {
          title: 'Unique players per day, for the past <?php echo $pastdays?> days'
        };

        var chart = new google.visualization.LineChart(document.getElementById('unique_players'));
        chart.draw(data, options);
      }
    </script>