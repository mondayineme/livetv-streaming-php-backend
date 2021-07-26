<?php 
session_start();
include "header.php"; 
include 'db.php';
if(isset($_SESSION['userid'])){
		$query = "select * from users where id=".$_SESSION['userid'];
		$rData = $conn->query($query);
		$data = $rData->fetch_assoc();
	}
?>
<div class="content_main">
	<div class="alert alert-primary"><h1>Profile</h1></div>
	<div class="user_profile">
		<div>
			<label>Username: </label>
			<h5><?php echo $data['username']; ?></h5>
		</div>
		<br>
		<div>
			<label>Api Key: </label>
			<h5><?php echo $data['api_key']; ?></h5>
		</div>
		<br>
		<div>
			<a href="./settings.php">
			<button class="btn btn-primary">Change Username</button>
			<button class="btn btn-info">Change Password</button>
			<button class="btn btn-danger">Change API Key</button>
			</a>
		</div>
	</div>

<?php  include "footer.php"; ?>