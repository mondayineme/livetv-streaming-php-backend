<?php 
session_start();
include "header.php"; ?>
 <?php require('db.php');
	if(isset($_SESSION['userid'])){
		$query = "select * from users where id=".$_SESSION['userid'];
		$rData = $conn->query($query);
		$data = $rData->fetch_assoc();
	}
?>

<?php 
	if(isset($_POST['api_key'])){
		if($_POST['api_key'] != $data['api_key']){
			$query = "update users set api_key='".$conn->real_escape_string($_POST['api_key'])."' where id=".$_SESSION['userid'];
			if($conn->query($query)){
				echo "<script>alert('New Api Key Saved');location.reload();;</script>";
			}else {
				echo "<script>alert('Error Saving.');</script>";
			}
		}
	}

	if(isset($_POST['username']) && isset($_POST['newusername'])){
		if($_POST['username'] == $data['username']){

			$newUsername = $_POST['newusername'];

			$check = "SELECT * FROM users WHERE username='".$newUsername."'";
		    $results = $conn->query($check);

		    if($results->num_rows > 0){
		         echo "<script>alert('Username Already Exists.');</script>";  
		    }else {

		        $sql = "update users set username='".$newUsername."'";
		        if($conn->query($sql) === true){
		            echo "<script>alert('Username Updated.');</script>" ;
		        }else {
		            echo $sql." -> ".$conn->error;
		      }
		}
	}else {
		echo "<script>alert('Username Not Found.');</script>" ;
	}
}

if(isset($_POST['oldPassword']) && isset($_POST['newPassword'])){

		$hash = $data['password'];
		$oldpassword = $_POST['oldPassword']; 
		$newPassword = $_POST['newPassword'];

		if(password_verify($oldpassword,$hash)){

			$newPasswordHash = password_hash($newPassword,PASSWORD_DEFAULT);

			$sql = "update users set password='".$newPasswordHash."'";
			 if($conn->query($sql) === true){
		            echo "<script>alert('Password Updated.');</script>" ;
		        }else {
		            echo $sql." -> ".$conn->error;
		      }

		}else {
			echo "<script>alert('Password Do Not Match.');</script>" ;
		}	
}

?>
<div class="content_main">
	<div class="alert alert-primary"><h1>Settings</h1></div>
	<form class="settings_form" method="post">
		<label>Your Api Key: </label>
		<input type="text" name="api_key" id="api" placeholder="Your Api Key" value="<?php echo $data['api_key'] ?>" required>
		<input type="button" name="api_key_btn"  onclick="generateKey()" value="Generate New Key">
		<label id="usernameLabel"></label>
		<input class="btn btn-primary" type="submit" name="submit" value="Save">	
	</form>
	<br>
	<form class="settings_form" method="post">
		<label>Change Username: </label>
		<input type="email" name="username" placeholder="Old Username" required>
		<input type="email" name="newusername" placeholder="New Username" required>
		<label></label>
		<input class="btn btn-primary" type="submit" name="submit" value="Save">	
	</form>
	<br>
	<form class="settings_form" method="post">
		<label>Change Password: </label>
		<input type="password" name="oldPassword" placeholder="Old Password" required>
		<input type="password" name="newPassword" placeholder="New Password" required>
		<label></label>
		<input class="btn btn-primary" type="submit" name="submit" value="Save">	
	</form>

	<script type="text/javascript">
		
		function randomstring(L) {
			  var s = '';
			  var randomchar = function() {
			    var n = Math.floor(Math.random() * 62);
			    if (n < 10) return n; //1-10
			    if (n < 36) return String.fromCharCode(n + 55); //A-Z
			    return String.fromCharCode(n + 61); //a-z
			  }
			  while (s.length < L) s += randomchar();
			  return s;
			}

			function generateKey(){
				var input = document.getElementById("api");
				input.value = randomstring(20);
			}
	</script>
</div>
<?php include "footer.php" ?>