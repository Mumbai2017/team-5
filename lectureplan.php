<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dash Board</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="comment.css">

    <link rel="stylesheet" href="webUIOne.css">
</head>
<body style="background-color: linen">
<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-WDM-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CEQUE</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-WDM-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
                <li><a href="mentordashboard.php">Videos</a></li>
                <li><a href="html/mentorlogin.html">Logout</a></li>         <!-- Add the logout link -->
            </ul>
        </div>
    </div>
</nav>

<div class="container table-responsive">
<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th><center>Date of upload</center></th>
        <th><center>Image</center></th>
        <th><center>Comments<center></th>
    </tr>
    <tr>
        <td>15th July,2017</td>
        <td><img src="plan1.jpg" height="150px"></td>
        <td>Elaborate on the procedure of teaching.</td>
    </tr>
	<tr>
        <td>18th July,2017</td>
        <td><img src="plan2.jpg" height="150px"></td>
        <td>Send a short demonstration of the same.</td>
    </tr>
    </tbody>
</table>
</div>

<body>
<!-- Mentors can submit the responce for the lecture plan -->
<form action="lectureplan.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="col-md-4">
        <b>Select image to upload:</b>
        </div>
        <div class="col-md-4">
        <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <div class="col-md-4">
        <input type="submit" value="Upload Image" name="submit">
        </div>
    </div>

</form>

<?php
$target_dir = "uploads/";
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<br>File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<br>File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "<br>Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<br>Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

</body>

<div class="container-fluid">
	<div class="row">
		<h3>Comments</h3>
	</div>
    
    <div class="row">
    
    <div class="col-md-6">
    						<div class="widget-area no-padding blank">
								<div class="status-upload">
									<form>
										<textarea placeholder="Any suggestions" ></textarea>
										<ul>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
										</ul>
										<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
									</form>
								</div><!-- Status Upload  -->
							</div><!-- Widget Area -->
						</div>
        
    </div>
</div>


<footer class="site-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <h3>Contact Address</h3>
                <address>
                    <b>Centre for Equity and Quality in Universal Education</b>
                    C/3 Sunita Apartments, Gujjar Lane,
                    Santacruz (W), Mumbai - 400054<br>
                    Maharashtra, INDIA<br>
                    Email: admin@ceque.org<br>
                    Phone: +91-22-2605-3242
                </address>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="col-md-5">&copy; 2017 - 2018</div>
        </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>