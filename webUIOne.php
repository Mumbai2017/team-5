<!-- <div>
   <video width="700" height="450" controls="controls" poster="image" preload="true">
     <source src="where the video is" type="video/mov"/>
     <source src="where the video is" type="video/mp4" />
     <source src="where the video is" type="video/oog" />
     Your browser does not support the video tag.
   </video>
</div> -->



<!-- <div align="center" class="embed-responsive embed-responsive-16by9">
    <video autoplay loop class="embed-responsive-item">
        <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
    </video>
</div> -->
<?php  
$videoCount=4;
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="webUIOne.css">
</head>

<body>
	<div class="container-fluid">

		<?php
		for($i=0; $i<$videoCount; $i++)
		{
			?>

			<div class="row">
				<div>
					<a href="webUITwo.php">Video Name 1</a>
				</div>
			</div>
			<div class="row">
				<div>
					<a href="webUITwo.php">
						<video autoplay loop  style="width:100%;">
							<source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4 />
						</video>
					</a>
				</div>
			</div>

		<?php

		}
		?>
		



		

	</div>

</body>
</html>