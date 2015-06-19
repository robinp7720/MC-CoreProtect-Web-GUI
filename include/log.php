
<?php

	
	$logs = array();
	$filter = array();	
	
	//Chat
	if (isset($_POST["chat"])){
		if ($_POST["chat"]=="on"){
			array_push($filter,"chat");
		}
	}
	//Command
	if (isset($_POST["command"])){
		if ($_POST["command"]=="on"){
			array_push($filter,"command");
		}
	}
	//Block
	if (isset($_POST["block"])){
		if ($_POST["block"]=="on"){
			array_push($filter,"block");
		}
	}
	//Chest
	if (isset($_POST["chest"])){
		if ($_POST["chest"]=="on"){
			array_push($filter,"container");
		}
	}
	//Session
	if (isset($_POST["session"])){
		if ($_POST["session"]=="on"){
			array_push($filter,"session");
		}
	}
	//Signs
	if (isset($_POST["signs"])){
		if ($_POST["signs"]=="on"){
			array_push($filter,"sign");
		}
	}
	
	
	if (isset($_POST["date"])&&$_POST["date"] != ""){
		$date = strtotime($_POST["date"]);
	}else{
		$date = strtotime("-1 hour");
	}
	
	if (isset($_GET["user"])){
		$id = getPlayerId($con, $tablepre, $_GET["user"]);
		$where = "user='$id' AND time>'$date'";
	}else{
		$where = "time>'$date'";
	}
	
	if (isset($_POST["search"])&&(isset($_POST["chat"])||isset($_POST["command"]))){
		$search = mysqli_real_escape_string($con,$_POST["search"]);
		$where .= "AND message LIKE '%$search%'";
	}
	
//Add everything too one array for easy sorting
foreach($filter as $value){
	$result = mysqli_query($con,"SELECT * FROM ".$tablepre.$value." WHERE ( ".$where." ) ORDER BY rowid DESC");
	
	while($row = mysqli_fetch_array($result)) {
		array_push($row,$value);
		array_push($logs,$row);
	}
}


	$log = array_sort($logs, "time",SORT_DESC);
?>
<table class="table">
<tr>
<th>Time</th>
<th>Type</th>
<th>X</th>
<th>Y</th>
<th>Z</th>
<th>User</th>
<th>Data</th>
<th>Amount</th>
</tr>
<?php	

	foreach($log as $row){

		if (in_array("block",$row)){
			echo '<tr class="block">';
			echo "<td>";
			echo date("Y-m-d h:i:sa",$row["time"]);
			echo "</td>";
			//BLOCKS
			echo "<td>";
			if ($row["action"]==0){
				echo "Block Broken";
			}elseif ($row["action"]==1){
				echo "Block Placed";
			}elseif ($row["action"]==2){
				echo "Block Used";
			}else{
				echo "Block Other";
			}
			
			echo "</td><td>";
			echo $row["x"];
			echo "</td><td>";
			echo $row["y"];
			echo "</td><td>";
			echo $row["z"];
			echo "</td><td>";
			echo getPlayerName($con, "".$tablepre."", $row["user"]);
			echo "</td><td>";
			
			echo $blocks[$row["type"]];
			echo "</td><td>";
			echo "</td>";
			
		}elseif (in_array("container",$row)){
			echo '<tr class="chest">';
			echo "<td>";
			echo date("Y-m-d h:i:sa",$row["time"]);
			echo "</td>";
			//CHEST
			echo "<td>";
			if ($row["action"]==0){
				echo "Container Item Removed";
			}elseif ($row["action"]==1){
				echo "Container Item Added";
			}else{
				echo "Container Other";
			}
			
			echo "</td><td>";
			echo $row["x"];
			echo "</td><td>";
			echo $row["y"];
			echo "</td><td>";
			echo $row["z"];
			echo "</td><td>";
			echo getPlayerName($con, "".$tablepre."", $row["user"]);
			echo "</td><td>";
			echo $blocks[$row["type"]];
			echo "</td><td>";
			echo $row["amount"];
			echo "</td>";
		}elseif (in_array("chat",$row)){
			echo '<tr class="chat">';
			echo "<td>";
			echo date("Y-m-d h:i:sa",$row["time"]);
			echo "</td>";
			//Chat
			echo "<td>";
			echo "Chat";
			echo "</td><td>";
			echo "</td><td>";
			echo "</td><td>";
			echo "</td><td>";
			echo getPlayerName($con, "".$tablepre."", $row["user"]);
			echo "</td><td>";
			echo strip_tags($row["message"]);
			echo "</td><td>";
			echo "</td>";
		}elseif (in_array("command",$row)){
			echo '<tr class="command">';
			echo "<td>";
			echo date("Y-m-d h:i:sa",$row["time"]);
			echo "</td>";
			//Command
			echo "<td>";
			echo "Command";
			echo "</td><td>";
			echo "</td><td>";
			echo "</td><td>";
			echo "</td><td>";
			echo getPlayerName($con, "".$tablepre."", $row["user"]);
			echo "</td><td>";
			echo strip_tags($row["message"]);
			echo "</td><td>";
			echo "</td>";
		}elseif (in_array("session",$row)){
			echo '<tr class="session">';
			echo "<td>";
			echo date("Y-m-d h:i:sa",$row["time"]);
			echo "</td>";
			//Session
			echo "<td>";
			if ($row["action"]==0){
				echo "Logged out";
			}elseif ($row["action"]==1){
				echo "Logged in";
			}else{
				echo "Session Other";
			}
			
			echo "</td><td>";
			echo $row["x"];
			echo "</td><td>";
			echo $row["y"];
			echo "</td><td>";
			echo $row["z"];
			echo "</td><td>";
			echo getPlayerName($con, "".$tablepre."", $row["user"]);
			echo "</td><td>";
			echo "</td><td>";
			echo "</td>";
		}elseif (in_array("sign",$row)){
			echo '<tr class="signs">';
			echo "<td>";
			echo date("Y-m-d h:i:sa",$row["time"]);
			echo "</td>";
			//Session
			echo "<td>";
			echo "Edited Sign";	
			echo "</td><td>";
			echo $row["x"];
			echo "</td><td>";
			echo $row["y"];
			echo "</td><td>";
			echo $row["z"];
			echo "</td><td>";
			echo getPlayerName($con, "".$tablepre."", $row["user"]);
			echo "</td><td>";
			
			Echo strip_tags($row['line_1'])."<br>";
			Echo strip_tags($row['line_2'])."<br>";
			Echo strip_tags($row['line_3'])."<br>";
			Echo strip_tags($row['line_4']);
			
			echo "</td><td>";
			echo "</td>";
		
		}
		echo "</tr>";
	}
?>
</table>
