	<br>
	<?php



		
		if(isset($_POST["password"])){
			
			if($_POST["password"]!=$settings["interfacepass"]){
				echo '<div class="alert alert-danger">
						 Wrong password</a>
						</div>';				
			}else{
				$_SESSION["auth"]=true;
				header( 'Location: index.php' ) ;
			}
		
		}
		
		?>

	
	<div class="panel panel-primary">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
				
				Please Login:
				<br>
				<form action="" method="post">
					<div class="input-group">
					  <input type="password" class="form-control" name="password">
					  <span class="input-group-btn">
						<button class="btn btn-default" type="submit">Login</button>
					  </span>
					</div><!-- /input-group -->
				 </form>
				
			</div>
		</div>
		
	