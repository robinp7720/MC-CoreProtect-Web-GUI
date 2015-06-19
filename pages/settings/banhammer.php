

<?php
if (!empty($_POST["host"])&&!empty($_POST["user"])&&!empty($_POST["dbpass"])&&!empty($_POST["dbname"])){
file_put_contents("configs/banhammer.php", '');
file_put_contents("configs/banhammer.php", '<?php ', FILE_APPEND);

file_put_contents("configs/banhammer.php", '$bhhost="'.$_POST["host"].'";', FILE_APPEND);
file_put_contents("configs/banhammer.php", '$bhuser="'.$_POST["user"].'";', FILE_APPEND);
file_put_contents("configs/banhammer.php", '$bhdbpass="'.$_POST["dbpass"].'";', FILE_APPEND);
file_put_contents("configs/banhammer.php", '$bhdbname="'.$_POST["dbname"].'";', FILE_APPEND);
file_put_contents("configs/banhammer.php", '$bhcon=mysqli_connect($bhhost,$bhuser,$bhdbpass,$bhdbname);', FILE_APPEND);


file_put_contents("configs/banhammer.php", '?>', FILE_APPEND);

echo '<div class="alert alert-success">Success!</div>';


}else{
if (!isset($_POST["host"])&&!isset($_POST["user"])&&!isset($_POST["dbpass"])&&!isset($_POST["dbname"])){
}else{
echo '<div class="alert alert-danger">Please fill in all fields</div>';
}
}
?>



	<div class="panel panel-primary">
		<div class="panel-heading">BanHammer DataBase Settings</div>
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
