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
                <li><a href="lectureplan.php">Lecture Plans</a></li>
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
        <th><center>Teacher Name</center></th>
		<th><center>Video</center></th>
        <th><center>Comments<center></th>
    </tr>
    <tr>
        <td>25th July,2017</td>
        <td>Sharmila Sengupta</td>
		<td><a href="#">Video 1</td>
        <td>Elaborate on the procedure of teaching.</td>
    </tr>
	<tr>
        <td>31th July,2017</td>
        <td>Mamta Banerjee</td>
		<td><a href="#">Video 2</td>
        <td>Good work.</td>
    </tr>
    </tbody>
</table>
</div>

<div class="container">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="video.mp4"></iframe>  <!-- Fetch the video link from the database -->
    </div>
</div>
<div class="container">
	<h1><center><b>Sentences<b><center></h1>
	</div>

<div class="container-fluid">
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
		</div>
		
		<!-- <form method="POST"> -->
		<div>
			<textarea cols="50" id="commentsArea" name="comm" rows="3"></textarea><br>
			<button class="btn btn-md btn-primary" name="submit" id="postButton">Post</button> 
			<!-- <button class="btn btn-md btn-primary" name="view" id="viewButton">View all Comments</button>  -->

		</div>

		
	</div>
	</div>
	<p>
		<div class="outer-margin" id="comments" name="comments">

		</div>
	</p>
	
<!--Once the video is fetched this can be executed
<?php
        $result = $mysqli->query("SELECT * FROM video WHERE id=".$_SESSION['user_id']." ORDER BY vid DESC");
        if($result->num_rows>0)
            while($row = $result->fetch_assoc())
        {
            echo "<h1>".$row['video_name']." uploaded by user ".$mysqli->query("SELECT email FROM users WHERE id = ".$row['id'].";")->fetch_assoc()['email'].'</h1><br><br>
<form method="post">
<textarea class="form-control" rows="2" cols="30" placeholder="Comment here" name="comment_text"></textarea>
<input type="hidden" name="video_id_to_work" value="'.$row['video_id'].'">
<input type="submit" class="btn btn-primary" name="comment_submit" value="Comment">
<input type="submit" class="btn btn-default" name="delete" value="Delete Video">
</form>';
            $comments_table = $mysqli->query("SELECT * FROM comments WHERE video_id=".$row['video_id']." ORDER BY comment_id DESC");
            if($comments_table->num_rows>0)
                while($comment_row = $comments_table->fetch_assoc())
                    echo "<h3>".$mysqli->query("SELECT email FROM users WHERE id = ".$comment_row['commentor_id'].";")->fetch_assoc()['email']." says : ".$comment_row['comment']."</h3>";
        }
        ?>
-->
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="webUITwo.js"></script>
<script type=text/javascript src="webUITwo.js" ></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>