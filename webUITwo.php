<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<!-- 	<script
	src="http://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script> -->

	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link  href="https://resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->


	<link rel="stylesheet" href="webUIOne.css">
</head>

<body>
	<!-- facebook comments -->
<!-- 	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script> -->

<div class="container-fluid">

	<div class="row">
		<div class="col-xs-4">
			<a href="webUITwo.php">
				<video style="width:100%" controls>
					<source src=sample.mp4 type=video/mp4 />
				</video>
			</a>
		</div>

	</div>

	<div class="row outer-margin">
		<div class="col-xs-12">
			<h2><?php echo 'Video Name';?><h2>
			</div>
		</div>

		<div class="row outer-margin">
		<!-- 	<div class="col-xs-4">
				<button class="btn btn-md btn-primary" id="commentButton">Comment</button>
			</div>
		-->
		<div class="col align-self-center" >
			<!-- <button class="btn btn-md btn-primary" id="postButton">Comment</button> -->
			<h3>Comments</h3>
		</div>
	</div>

	<div class="row outer-margin">
		<div class="col-xs-4 " id="area">

			<form method="POST" >
				<textarea cols="50" id="commentsArea" rows="3"></textarea><br>
				<button class="btn btn-md btn-primary" id="postButton">Post</button> 
				<div class="outer-margin" id="comments">


				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script type=text/javascript src="webUITwo.js" ></script>
</body>
</html>