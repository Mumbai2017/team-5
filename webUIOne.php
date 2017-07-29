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

$teacherid="";

if(isset($_POST['username']))   // getting the json data from php 
{
	$obj = json_decode($_POST['username']);
	//echo $obj->{'username'};
	$teacherid=$obj->{'username'};
}

$videocount=4;   //this was just for static changes

// $con=mysqli_connect('54.169.228.25','root','root','team-5');
// $sql="Select vid from video where uid=".$teacherid;

// $result=mysqli_query($con,$sql);
// $videocount=mysqli_num_rows(result);



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
		for($i=0; $i<$videocount ;$i++)
		{
			?>
	
		<div class="row outer-margin">
			<div>
				<a href="webUITwo.php"><h2>Video Name 1</h2></a>
			</div>
		</div>
		<div class="row outer-margin">
			<div>
				<a href="webUITwo.php">
					<video  loop  style="width:100%;" controls>
						<source src=sample.mp4 type=video/mp4 />
					</video>
				</a>
			</div>
		</div>

		<?php
	}
	?>


		<div class="row outer-margin">
		<!-- begin wwww.htmlcommentbox.com -->
				<div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
				<link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
				<script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1501351997452");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
				<!-- end www.htmlcommentbox.com -->
		</div>
	</div>
</body>
</html>
