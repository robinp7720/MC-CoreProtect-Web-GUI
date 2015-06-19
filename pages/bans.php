<?php
if (isset($bhcon)){
$result = mysqli_query($bhcon,"SELECT * FROM banhammer_bans");

$count=0;

while($row = mysqli_fetch_array($result)) {

  
  	if ($count == 0){
		echo '<div class="row"> ';
	}
	echo '<div class="col-md-4">';
	
	if ($row["state"]=="2"){
		echo '<div class="alert alert-success">';
	}else{
		if ($row["expires_at"]==NULL){
		 echo '<div class="alert alert-danger">';
		}else{
			if (strtotime($row["expires_at"])>time()){
				echo '<div class="alert alert-danger">';
			}else{
				echo '<div class="alert alert-success">';
			}
		}
	}
	
	echo '<h4>'.getBansPlayerName($bhcon, $row["creator_id"]) . " Banned " . getBansPlayerName($bhcon, $row["player_id"]) . "</h4><h5> For ".$row["reason"]."</h5>";
	echo '<br>Ban issued on: '.$row["created_at"];
	if ($row["expires_at"]!=NULL){
		$banlength=strtotime($row["expires_at"])-strtotime($row["created_at"]);
		if (strtotime($row["expires_at"])>time()){
			echo '<br>Ban expiry on: '.$row["expires_at"];
			echo '<br>Ban lenght: '.time_elapsed_B($banlength);
		}else{
			echo '<br>Ban expired on: '.$row["expires_at"];
			echo '<br>Ban lasted: '.time_elapsed_B($banlength);
		}
	}
	echo '</div>';
	
	echo '</div>';
	$count=$count+1;
	if ($count==3){
	$count=0;
	echo '</div>';
	}
  
}
}else{
				echo '<div class="alert alert-danger">
						 BanHammer Database has not been setup</a>
						</div><br>';

}
?>