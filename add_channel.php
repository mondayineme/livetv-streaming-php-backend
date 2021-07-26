<?php include "header.php"; ?>


<?php 
	if(isset($_POST['channel_name']) && isset($_POST['channel_description'])){
		require_once('db.php');
		$conn->set_charset("utf8"); 
		if(isset($_GET['edit']))
			$channel_id = $conn->real_escape_string($_GET['edit']);
		$channel_name = $conn->real_escape_string($_POST['channel_name']);
		$channel_description = $conn->real_escape_string($_POST['channel_description']);
		$live_url = $conn->real_escape_string($_POST['live_url']);
		$thumbnail = $conn->real_escape_string($_POST['thumbnail']);
		$facebook = $conn->real_escape_string($_POST['facebook']);
		$twitter = $conn->real_escape_string($_POST['twitter']);
		$youtube = $conn->real_escape_string($_POST['youtube']);
		$website = $conn->real_escape_string($_POST['website']);
		$category = $conn->real_escape_string($_POST['category']);

		if(isset($_GET['edit'])){
			$query = "update channels set name = '".$channel_name."', description = '".$channel_description."', live_url = '".$live_url."', thumbnail = '".$thumbnail."',facebook = '".$facebook."', category='".$category."' , twitter='".$twitter."', youtube='".$youtube."', website ='".$website."' where id=".$channel_id."";


		}else {
			$query = "insert into channels(name,description,live_url,thumbnail,facebook,twitter,youtube,website,category) values('".$channel_name."','".$channel_description."','".$live_url."','".$thumbnail."','".$facebook."','".$twitter."','".$youtube."','".$website."','".$category."')";
		}

		if($conn->query($query)){
			echo "<script>alert('Data Inserted')</script>";

		}else{
			echo $conn->error;
		}
	}

?>



<div class="content_main">
	<div class="alert alert-primary">
		<?php if (isset($_GET['edit'])){ 
			require 'db.php';
			$id = $conn->real_escape_string($_GET['edit']);
			$query = "select * from channels where id=".$id.";";
			$rawData = $conn->query($query); 
			$data = $rawData->fetch_assoc();

			?>
		<h1>Edit Channel</h1>
		<div class="add_question_form">
			<form method="post">
				<label for="channel_name">Channel Name</label>
				<input type="text" name="channel_name" value="<?php echo $data['name']; ?>" plceholder="Channel Name" required>

				<label for="channel_description">Channel Description</label>
				<textarea type="text" name="channel_description" required placeholder="Channel Description"> <?php echo $data['description']; ?></textarea>

				<label for="live_url">Live Url</label>
				<input type="text" name="live_url" placeholder="Live Url" value="<?php echo $data['live_url']; ?>">

				<label for="thumbnail">Thumbnail</label>
				<input type="text" name="thumbnail" placeholder="Thumbnail" value="<?php echo $data['thumbnail']; ?>">

				<label for="facebook">Facebook</label>
				<input type="text" name="facebook" placeholder="facebook" value="<?php echo $data['facebook']; ?>">

				<label for="twitter">Twitter</label>
				<input type="text" name="twitter" placeholder="twitter" value="<?php echo $data['twitter']; ?>">

				<label for="youtube">Youtube</label>
				<input type="text" name="youtube" placeholder="youtube" value="<?php echo $data['youtube']; ?>">

				<label for="website">Website</label>
				<input type="text" name="website" placeholder="Website" value="<?php echo $data['website']; ?>">

				<label for="category">Category</label>
				<select name="category"  required>
					<?php 
						$query = "select * from categories;";
						$rawData = $conn->query($query) or die("Failed to Retrive data from db");
						while($row = $rawData -> fetch_assoc() ) {
							if($data['category'] == $row['name']){
								?> <option selected><?php echo $row['name']; ?></option>  <?php 
							}else {
							?> 
							<option><?php echo $row['name']; ?></option>
				
							<?php 
						}}
					 ?>
				</select>
				<input type="submit" name="Submit" value="Save">
			</form>
		</div>


		<?php }else { ?>
		<h1>Add New Channel</h1>
		<div class="add_question_form">
			<form method="post">
				<input type="text" name="channel_name" placeholder="Channel Name" required>
				<textarea type="text" name="channel_description" required placeholder="Channel Description"> Sample Channel Description</textarea>
				<input type="text" name="live_url" placeholder="Live Url" required>
				<input type="text" name="thumbnail" placeholder="Thumbnail" required>
				<input type="text" name="facebook" placeholder="facebook" >
				<input type="text" name="twitter" placeholder="twitter" >
				<input type="text" name="youtube" placeholder="youtube" >
				<input type="text" name="website" placeholder="website" >
				<select name="category"  required>
					<?php 
					require 'db.php';
						$query = "select * from categories;";
						$rawData = $conn->query($query) or die("Failed to Retrive data from db");
						while($row = $rawData -> fetch_assoc() ) {
							?> 
								<option><?php echo $row['name']; ?></option>
							<?php 
						}
					 ?>
				</select>
				<input class="btn btn-primary" type="submit" name="Submit">
			</form>
		</div>
		 <?php } ?>
	</div>
</div>
<?php include "footer.php" ?>