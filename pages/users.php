

<?php
if (isset($settings["queryIP"])&&isset($settings["queryPort"])){
	if ($settings["queryIP"]!=""){
		try{
		$Query = new MinecraftQuery( );
		$Query->Connect($settings["queryIP"] , $settings["queryPort"] );
		
		$players=$Query->GetPlayers( ) ;
		
		If(gettype($players)!="array"){
		$players=array();
		}
		}catch(MinecraftQueryException $e){
			echo '<div class="alert alert-danger">'.$e->getMessage( )."</div>";
		}
	}
	else{
		$players=array();
	}
}else{
	$players=array();
}
// Check connection
if (mysqli_connect_errno()) {
  echo '<div class="panel panel-danger"><div class="panel-heading">MYSQL Connection Error</div>'.mysqli_connect_error().'</div>';
}


if (isset($_GET["search"])){$search=$_GET["search"];}else{$search="";}
//$result = mysqli_query($con,"SELECT * FROM ".$tablepre."user");
$result = mysqli_query($con,"SELECT * FROM ".$tablepre."user WHERE (user LIKE '%".$search."%')");
$count = 0;

while($row = mysqli_fetch_array($result)) {
	if (substr($row['user'], 0, 1)!="#"){
	if ($count == 0){
		echo '<div class="row"> ';
	}
	echo '<div class="col-md-4">';
	
	//echo '<div class="well well-sm">';
	if (in_array("banhammer",$plugins)){
		$id = getBansPlayerId($bhcon, $row['user']);
	}
	
	if (in_array($row['user'],$players)){
		echo '<blockquote style="border-left-color:rgb(61, 255, 0);"><a href="index.php?page=log&user='.$row['user'].'"><img src="https://minotar.net/avatar/'.$row['user'].'/30"/> '.$row['user']."</a>";
	}else{
		if (in_array("banhammer",$plugins)){
			if (is_banned($bhcon,$id)){
				echo '<blockquote style="border-left-color:rgb(255, 0, 0);"><a href="index.php?page=log&user='.$row['user'].'"><img src="https://minotar.net/avatar/'.$row['user'].'/30"/> '.$row['user']."</a>";
			}else{
				echo '<blockquote><a href="index.php?page=log&user='.$row['user'].'"><img src="https://minotar.net/avatar/'.$row['user'].'/30"/> '.$row['user']."</a>";
			}
		}else{
			echo '<blockquote><a href="index.php?page=log&user='.$row['user'].'"><img src="https://minotar.net/avatar/'.$row['user'].'/30"/> '.$row['user']."</a>";
		}
	}
	if (in_array("banhammer",$plugins)){
		
		$bhresult = mysqli_query($bhcon,"SELECT * FROM banhammer_bans WHERE player_id='$id'");
		if($bhresult == true){
			$bancounts=0;
			while($bhrow = mysqli_fetch_array($bhresult)) {
				$bancounts=$bancounts+1;
			}
			//echo '<blockquote class="blockquote-reverse">';
			echo '<footer>';
			if ($bancounts>1){
				echo 'Banned '.$bancounts.' times';
			}elseif($bancounts==1){
				echo 'Banned once';
			}else{
				echo 'No Ban record';
			}
			echo '</footer>';
		}
		echo '</blockquote>';		
		
	}
	//echo '</div>';
	
	echo '</div>';
	$count=$count+1;
	if ($count==3){
	$count=0;
	echo '</div>';
	}
	
	}
	}
?>


</div>


