<?php
$result = mysqli_query($con,"SELECT * FROM ".$tablepre."command WHERE `message` LIKE '/{$settings["report"]}%' ORDER BY `rowid` DESC");
$count=0;
while($row = mysqli_fetch_array($result)) {
if ($row["message"]!="/report"){
if ($count == 0){
		echo '<div class="row"> ';
}
echo '<div class="col-md-4">';
echo '<div class="alert alert-success">';
echo "<h4>".getPlayerName($con, "".$tablepre."", $row["user"])."</h4>";
echo "<p>".substr(strip_tags($row["message"]),strlen("/{$settings["report"]}"))."</p>";
	
	echo '</div></div>';
	$count=$count+1;
	if ($count==3){
	$count=0;
	echo '</div>';
	}
}
}
?>