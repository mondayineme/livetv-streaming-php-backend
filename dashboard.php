<?php include "header.php"; ?>
 <?php require('db.php');
	        $query = "select(select count(id) from categories) as total_cat,(select count(id) from channels) as total_channel";
	        $rData = $conn->query($query);
	        $data = $rData->fetch_assoc();
	        $total_cat = $data['total_cat'];
	        $total_channel = $data['total_channel'];
	        
	        
	    
	    ?>
<div class="content_main">
	<div class="alert alert-primary"><h1>Dashboard</h1></div>
	<div class="dashboard_cards">
		<div class="row">
			<div class="col">
				<div class="card" style="width: 16rem;">
				  <div class="card-body" >
				    <h5 class="card-title">Categories</h5>
				    <p class="card-text"><?php echo $total_cat ?></p>
				    <a href="./categories.php" class="btn btn-primary">View All</a>
				  </div>
				</div>
			</div>

			<div class="col">
				<div class="card" style="width: 16rem;">
				  <div class="card-body">
				    <h5 class="card-title">Channels</h5>
				    <p class="card-text"><?php echo $total_channel ?></p>
				    <a href="./channels.php" class="btn btn-primary">View All</a>
				  </div>
				</div>
			</div>

			<div class="col">
				<div class="card" style="width: 16rem;">
				  <div class="card-body">
				    <h5 class="card-title">Users</h5>
				    <p class="card-text">5012</p>
				    <a href="./users.php" class="btn btn-primary">View All</a>
				  </div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php include "footer.php" ?>