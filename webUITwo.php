<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



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

		<div class="row outer-margin justify-content-end ">
			<div class="col-xs-12">
				<button class="btn btn-sm btn-primary" id="commentButton">Comment</button>
			</div>
		</div>

		<!-- <div class="row justify-content-end">
			<div class="col-xs-12">
			<button class="btn btn-md btn-primary">Comment</button>
			</div>
		</div> -->

		<div class="row outer-margin">
			<div class="col-xs-12" id="comments">
			<!-- facebook comments -->
				<!-- <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div> -->
			</div>
		</div>
	</div>


</body>
</html>