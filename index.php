<?php
$debug=1;

if ($debug==0){
error_reporting(0);
@ini_set('display_errors', 0);
}else{
error_reporting(1);
@ini_set('display_errors', 1);
}
session_start();
include __DIR__ . "/configs/coreprotect.php";
include __DIR__ . "/configs/banhammer.php";
include __DIR__ . "/configs/general.php";
include __DIR__ . "/configs/version.php";
include __DIR__ . "/configs/plugins.php";
include __DIR__ . "/include/blocks.php";
require __DIR__ . "/include/functions.php";
require __DIR__ . '/include/MinecraftQuery.class.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include "include/header.php" ?>
	</head>
	<body style="padding-top: 70px;">
		
		<?php
			if (isset($_GET["user"])) $user = $_GET["user"]; //Set user if aviable for later use 
			if (isset($_GET["page"])) $page = $_GET["page"]; //Set Page Variable to include the correct page
			if (!isset($_GET["page"])||empty($_GET["page"]))$page="home"; // If no page is specified Home is used

			if (!isset($settings["interfacepass"])||!isset($settings["login"])||isset($_SESSION["auth"])||$settings["login"]=="")include "include/nav.php"; //If logged in or first install or no login add the nav bar
		?>

		<div class="container">

		<?php
			if (!isset($settings["interfacepass"])||!isset($settings["login"])||isset($_SESSION["auth"])||$settings["login"]==""){
				include "pages/".str_replace(array("/",".",":"),"",$page).".php"; //Include the page
			}else{
				include "pages/login.php"; //If not loggedin, show the login page
			}
		?>

		</div>

		
	</body>
	<script>jQuery('#datetimepicker').datetimepicker();</script>
</html>