<?php
$file ="configs/general.php";
$config="";
if (isset($_POST["submit"])){




	$config .= '<?php $settings=array(';
	
	$config .= '"interfacepass" => "'.$_POST["interfacepass"].'"';
	$config .= ',"login" => "'.$_POST["login"].'"';
	if(isset($_POST["queryip"])) $config .= ',"queryIP" => "'.$_POST["queryip"].'"';
	if(isset($_POST["queryport"])) $config .= ',"queryPort" => "'.$_POST["queryport"].'"';
	if(isset($_POST["report"])) $config .= ',"report" => "'.$_POST["report"].'"';

	
	$config .= ') ?>';
	file_put_contents($file, $config);

	echo '<div class="alert alert-success">Success!</div>';


}

?>




	<div class="panel panel-primary">
		<div class="panel-heading">General Settings</div>
			<div class="panel-body">
				<form action="" method="post">
				<div class="row">
					<div class="col-md-6">
						<input type="password" class="form-control" placeholder="Interface Password" name="interfacepass" value="<?php echo $settings["interfacepass"]; ?>">
						<br>
					</div>
					<div class="col-md-6">
						<label class="btn btn-primary">
						<input type="checkbox" name="login" <?php if($settings["login"]=="on")echo "checked"; ?>> Enable login?
						</label>
						</br>
					</div>
				</div>	
				<br>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" placeholder="Server Query IP" name="queryip" value="<?php echo $settings["queryIP"]; ?>">
						<br>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control" placeholder="Server Query Port" name="queryport" value="<?php echo $settings["queryPort"]; ?>">
						</br>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<input type="text" class="form-control" placeholder="Report Command" name="report" value="<?php echo $settings["report"]; ?>">
						<br>
					</div>
					<div class="col-md-6">
						</br>
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
