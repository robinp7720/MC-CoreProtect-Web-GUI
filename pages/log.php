

				
	<div class="panel panel-primary">
				<div class="panel-heading">Filter</div>
				<div class="panel-body">
				<!--Filter-->
			<form action="" method="post">
				<div class="input-group">
				  <span class="input-group-addon">Date</span>
				  <input id="datetimepicker" class="form-control" placeholder="Date" name="date" <?php if (isset($_POST["search"])) echo 'value="'.$_POST["date"].'"';?>>
				</div>
				<br>
				<div class="row">
				<div class="col-md-8">
				<div class="btn-group" data-toggle="buttons">				  
				  
				  <label class="btn btn-primary <?php if ($_POST["block"])echo "active" ?>">
					<input type="checkbox" name="block" <?php if ($_POST["block"])echo "checked" ?>> Blocks
				  </label>
				  <label class="btn btn-primary <?php if ($_POST["chat"])echo "active" ?>">
					<input type="checkbox" name="chat" <?php if ($_POST["chat"])echo "checked" ?>> Chat
				  </label>
				  <label class="btn btn-primary <?php if ($_POST["command"])echo "active" ?>">
					<input type="checkbox" name="command" <?php if ($_POST["command"])echo "checked" ?>> Commands
				  </label>
				  <label class="btn btn-primary <?php if ($_POST["chest"])echo "active" ?>">
					<input type="checkbox" name="chest" <?php if ($_POST["chest"])echo "checked" ?>> Containers
				  </label>
				   <label class="btn btn-primary <?php if ($_POST["signs"])echo "active" ?>">
					<input type="checkbox" name="signs" <?php if ($_POST["signs"])echo "checked" ?>> Signs
				  </label>
				  <label class="btn btn-primary <?php if ($_POST["session"])echo "active" ?>">
					<input type="checkbox" name="session" <?php if ($_POST["session"])echo "checked" ?>> Session
				  </label>
				</div>
				<br><br>
				</div>
				<div class="col-md-4">
				<?php
				
//Search
if (isset($_POST["chat"])||isset($_POST["command"])): ?>
<div class="input-group">
  <span class="input-group-addon">Search</span>
  <input type="text" class="form-control" placeholder="Search Chat" name="search" <?php if (isset($_POST["search"])) echo 'value="'.$_POST["search"].'"';?>>
</div>
<?php endif; ?>
</div>
</div>				
				<button type="submit" class="btn btn-default">Submit</button>
				</form>
				
				<!--Filter End-->
				
			</div>
		</div>
	<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Log</div>

  <!-- Table -->
  <?php
  include "include/log.php";
  ?>
</div>
</div>
