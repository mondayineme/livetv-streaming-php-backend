<?php 
if(isset($_GET['url'])){ ?>
		<?php include "header.php"; ?>
		<div class="content_main">
			<div class="alert alert-primary"><h1>Watch Live</h1></div>
				<video preload="none" id="player" autoplay controls crossorigin playsinline></video>
				<script src="https://cdn.plyr.io/1.8.2/plyr.js"></script>
				<script src="https://cdn.jsdelivr.net/hls.js/latest/hls.js"></script>

			<script type="text/javascript">
				(function () {
				  var video = document.querySelector('#player');

				  if (Hls.isSupported()) {
				    var hls = new Hls();
				    hls.loadSource('<?php echo $_GET['url']; ?>');
				    hls.attachMedia(video);
				    hls.on(Hls.Events.MANIFEST_PARSED,function() {
				      video.play();
				    });
				  }
  
			  plyr.setup(video);
			})();
			</script>	   	
		</div>

	<?php include "footer.php" ?>
<?php } else {
	echo "We Should Break up. ";
}


?>