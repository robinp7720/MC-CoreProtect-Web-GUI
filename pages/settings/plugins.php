<?php
$file ="configs/plugins.php";
$config="";
if (isset($_POST["submit"])){




	$config .= '<?php $plugins=array(';
	
	if(isset($_POST["banhammer"]))$config .= '"banhammer"';
	if(isset($_POST["stats"]))$config .= ',"stats"';
	
	
	$config .= ');?>';
	file_put_contents($file, $config);

	echo '<div class="alert alert-success">Success!</div>';


}

?>



	<div class="panel panel-primary">
		<div class="panel-heading">Plugin integration Settings</div>
			<div class="panel-body">
				<form action="" method="post">
				<div class="row">
				  <div class="col-md-6">
					  <label class="btn btn-primary">
						<input type="checkbox" name="banhammer" <?php if(in_array("banhammer",$plugins))echo "checked"; ?> >Enable banhammer
					  </label>
				  </div>
				  <div class="col-md-6">
				  
				  </div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-8"></div>
				  <div class="col-md-4">
				  <button type="submit" class="btn btn-default btn-lg" name="submit" value="true">
					  <span class="glyphicon glyphicon-floppy-disk"></span> Save
				  </button>
				  
				  </div>
				</div>
			</form>

			
			</div>
		</div>
