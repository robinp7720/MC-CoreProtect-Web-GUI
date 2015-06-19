

<?php
if (!empty($_POST["host"])&&!empty($_POST["user"])&&!empty($_POST["dbpass"])&&!empty($_POST["dbname"])&&!empty($_POST["tablepre"])){
file_put_contents("configs/coreprotect.php", '');
file_put_contents("configs/coreprotect.php", '<?php ', FILE_APPEND);

file_put_contents("configs/coreprotect.php", '$host="'.$_POST["host"].'";', FILE_APPEND);
file_put_contents("configs/coreprotect.php", '$user="'.$_POST["user"].'";', FILE_APPEND);
file_put_contents("configs/coreprotect.php", '$dbpass="'.$_POST["dbpass"].'";', FILE_APPEND);
file_put_contents("configs/coreprotect.php", '$dbname="'.$_POST["dbname"].'";', FILE_APPEND);
file_put_contents("configs/coreprotect.php", '$tablepre="'.$_POST["tablepre"].'_";', FILE_APPEND);
file_put_contents("configs/coreprotect.php", '$interfacepass="'.$_POST["interfacepass"].'";', FILE_APPEND);
file_put_contents("configs/coreprotect.php", '$con=mysqli_connect($host,$user,$dbpass,$dbname);', FILE_APPEND);


file_put_contents("configs/coreprotect.php", '?>', FILE_APPEND);

echo '<div class="alert alert-success">Success!</div>';


}else{
if (!isset($_POST["host"])&&!isset($_POST["user"])&&!isset($_POST["dbpass"])&&!isset($_POST["dbname"])&&!isset($_POST["tablepre"])){
}else{
echo '<div class="alert alert-danger">Please fill in all fields</div>';
}
}
?>



	<div class="panel panel-primary">
		<div class="panel-heading">CoreProtect DataBase Settings</div>
			<div class="panel-body">
				<form action="" method="post">
				<div class="row">
				  <div class="col-md-6"><input type="text" class="form-control" placeholder="DataBase Host" name="host" ></div>
				  <div class="col-md-6"><input type="text" class="form-control" placeholder="DataBase UserName" name="user" ></div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-6"><input type="password" class="form-control" placeholder="DataBase Password" name="dbpass" ></div>
				  <div class="col-md-6"><input type="text" class="form-control" placeholder="DataBase Name" name="dbname" ></div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-6">
				  <div class="input-group">
					<input type="text" class="form-control" placeholder="Table Prefix" name="tablepre" >
					<span class="input-group-addon">_</span>
				  </div>
				  
				  </div>
				</div>
				<br>
				<div class="row">
				  <div class="col-md-8"></div>
				  <div class="col-md-4">
				  <button type="submit" class="btn btn-default btn-lg">
					  <span class="glyphicon glyphicon-floppy-disk"></span> Save
				  </button>
				  
				  </div>
				</div>
			</form>

			
			</div>
		</div>
