<?php include "header.php"; ?>
<div class="content_main">
	<div class="alert alert-primary"><h1>All Channels <a style="float: right;" href="./add_channel.php">+</a></h1></div>
	<div class="cat_cards">
		<div class="row">
	<?php
		require 'db.php';
		$conn->set_charset("utf8"); 
		$query = "select * from channels order by id desc;";
		$raw = $conn->query($query);
		while($row = $raw->fetch_assoc()){ ?>
			<div class="col">
				<div class="card" >
				  <img class="card-img-top" src="<?php echo $row['thumbnail'] ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><a href="./view.php?cat=<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a> </h5>
				    <p style="display: flex;">
				    	<a  class="btn btn-primary" href="./play.php?url=<?php echo $row['live_url']; ?>">Play </a> 
				    	<a class="btn btn-danger" href="./delete.php?id=<?php echo $row['id']; ?>"> Delete </a> 
				    	<a class="btn btn-info" href="./add_channel.php?edit=<?php echo $row['id']; ?>"> Edit</a>
				    </p>
				  </div>
				</div>
			</div>
		<?php }
	?>
</div></div>
</div>
<?php include "footer.php" ?>