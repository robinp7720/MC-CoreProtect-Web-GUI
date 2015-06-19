<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-th"></span>

      </button>
      <a class="navbar-brand" href="#">Web Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($page=="home"){echo'class="active"';}?>><a href="index.php?page=home">Home</a></li>
        <li <?php if($page=="users"){echo'class="active"';}?>><a href="index.php?page=users">Users</a></li>
		<li <?php if($page=="settings"){echo'class="active"';}?>><a href="index.php?page=settings">Settings</a></li>
		<li <?php if($page=="log"){echo'class="active"';}?>><a href="index.php?page=log">Log</a></li>
		<li <?php if($page=="stats"){echo'class="active"';}?>><a href="index.php?page=stats">Stats</a></li>
		<li <?php if($page=="reports"){echo'class="active"';}?>><a href="index.php?page=reports">Reports</a></li>
		<?php
		if (in_array("banhammer",$plugins)){
			if($page=="bans"){
			echo '<li class="active"><a href="index.php?page=bans">Bans</a></li>';
			}else{
			echo '<li><a href="index.php?page=bans">Bans</a></li>';
			}
		}
		?>
		</ul>
	  <?php
	  if ($settings["login"]=="on"){
	  echo '<ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>';
	  }
	  ?>
	  
		   <form class="navbar-form navbar-right" role="search" method="get" action="search.php">
			<div class="form-group">
			  <input type="text" class="form-control" name="search">
			</div>
			<button type="submit" class="btn btn-default">Search</button>
		  </form>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>
</nav>