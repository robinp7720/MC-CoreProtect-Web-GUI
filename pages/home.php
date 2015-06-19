

<div class="panel panel-primary">
<div class="panel-heading">CoreProtect Web Interface</div>
<div class="panel-body">

Welcome back to the core protect interface!

</div>
</div>

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
?>

<div class="panel panel-primary">
<div class="panel-heading">Online Players</div>
<div class="panel-body">

<?php
foreach ($players as $value){
echo '<img style="margin:2px;" class="add-tooltip" src="https://minotar.net/avatar/'.$value.'/50" data-toggle="tooltip" data-placement="left" title="'.$value.'" / >';
}
?>

</div>
</div>
<script src="http://code.jquery.com/jquery.min.js"></script>
<!--<link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />-->
<script src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
<script type="text/javascript">
 $(document).ready(function()
     {
        $('.add-tooltip').tooltip();
     });
</script>   