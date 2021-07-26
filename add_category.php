<?php include "header.php"; ?>


<?php 
	if(isset($_POST['cat_name']) && isset($_POST['cat_image_url'])){
		require_once('db.php');
		$conn->set_charset("utf8"); 
		$query = "insert into categories(name,image_url) values('".$_POST['cat_name']."','".$_POST['cat_image_url']."')";
		if($conn->query($query)){
			echo "<script>alert('Data Inserted')</script>";
		}
	}

?>
 


<div class="content_main">
	<div class="alert alert-primary">
		<h1>Add Category</h1>
		<div class="add_cat_form">
			<form method="post">
				<input type="text" name="cat_name" placeholder="Category Name">
				<input type="text" name="cat_image_url" placeholder="Category Image">
				<input type="submit" name="Submit">
			</form>


		</div>
	</div>
</div>
<?php include "footer.php" ?>
