<div class="row">
  <div class="col-md-4">
	  <div class="list-group">
		  <a href="index.php?page=settings&setting=general" class="list-group-item <?php if($_GET["setting"]=="general"||!isset($_GET["setting"])){echo "active";}?>">
			<h4 class="list-group-item-heading">General Settings</h4>
			<p class="list-group-item-text">Edit some settings about the website</p>
		  </a>
		  <a href="index.php?page=settings&setting=CoreProtect" class="list-group-item <?php if($_GET["setting"]=="CoreProtect"){echo "active";}?>">
			<h4 class="list-group-item-heading">Core Protect database</h4>
			<p class="list-group-item-text">Edit the core protect database settings</p>
		  </a>
		  <a href="index.php?page=settings&setting=BanHammer" class="list-group-item <?php if($_GET["setting"]=="BanHammer"){echo "active";}?>">
			<h4 class="list-group-item-heading">Ban Hammer database</h4>
			<p class="list-group-item-text">Edit the BanHammer database settings</p>
		  </a>
		  <a href="index.php?page=settings&setting=Plugins" class="list-group-item <?php if($_GET["setting"]=="Plugins"){echo "active";}?>">
			<h4 class="list-group-item-heading">Plugin integration</h4>
			<p class="list-group-item-text">Activate and deactivate support for other plugins with mysql support</p>
		  </a>
		</div>
  
  
  
  </div>
  <div class="col-md-8">
  <?php
  if(!isset($_GET["setting"])){
  include "pages/settings/general.php";
  }elseif($_GET["setting"]=="general"){
  include "pages/settings/general.php";
  }elseif($_GET["setting"]=="CoreProtect"){
  include "pages/settings/database.php";
  }elseif($_GET["setting"]=="BanHammer"){
  include "pages/settings/banhammer.php";
  }elseif($_GET["setting"]=="Plugins"){
  include "pages/settings/plugins.php";
  }
  ?>
  
  
  </div>
</div>