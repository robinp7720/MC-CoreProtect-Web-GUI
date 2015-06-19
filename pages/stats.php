<?php
$playercount=0;
$pastdays = 60;
$olddate=00000000;
$uniqueplayers="";
?>
<div id="unique_players"></div>
<?php
$count=0;

$result = mysqli_query($con,"SELECT * FROM ".$tablepre."session
where time >= unix_timestamp(curdate() - interval $pastdays day)");
$players = array();

while($row = mysqli_fetch_array($result)) {
	
	if ($olddate==00000000){
		$olddate=$row["time"];
	}
	

	$day = date("D",$row["time"]);
	$oldday = date("D",$olddate);
	
	if (!in_array($row["user"],$players)){
		array_push($players,$row["user"]);
	}
	
	if ($oldday!=$day){

		$uniqueplayers.="['".$oldday."',".count($players)."],";

		$players = array();
		$olddate=$row["time"];
	}
	
}
include "include/stats_js.php";
?>