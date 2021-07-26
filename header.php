<?php     
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {

        //header("Location: index.php");
    }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>LiveTV - Watch Free to Air Live TV Channels</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/1.8.2/plyr.css">
</head>
<body>
	<div class="main_wrapper container">
		<header class="site_branding">
			<div class="brand_wrapper">
				<div class="brand">
				<h1 class="site_title">LiveTV</h1>
				</div>

				<div class="site_navigation">
					<nav>
						<a href="/tvapp/dashboard.php">Home</a>
						<a href="./categories.php">Categories</a>
						<a href="./channels.php">Channels</a>
						<a href="./settings.php">Settings</a>
						<a href="./logout.php">Logout</a>
					</nav>
				</div>
			</div>
		</header>

		<div class="site_content">
			<div class="side_menu_bar">
				<nav class="side_menu_nav">
					<a href="/tvapp/dashboard.php">Home</a>
					<a href="./channels.php">Channels</a>
					<a href="./categories.php">Categories</a>
					<a href="./user.php">Users</a>
				</nav>
			</div>