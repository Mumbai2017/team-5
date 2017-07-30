<?php
$dbhost  = 'localhost';    
$dbname  = ''; //db name
$dbuser  = '';  //user
$dbpass  = '';  // pass

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

$ftp_server=''; //serverip
    $conn_id = ftp_connect($ftp_server);
	
	$userf="";//ftp user
    $passwd=""; // ftp pass
    $login_result = ftp_login($conn_id, $userf, $passwd);
	
	if ((!$conn_id) || (!$login_result)) {
        echo "FTP connection has failed!";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name";
        die;
    } else {
       
    }

  if(isset($_POST['vid_name'])){	
	ftp_chdir($conn_id, "CHANGE TO UPLOAD DIR");
	
	//echo ftp_pwd($conn_id);
  $dest = $_FILES["vid"]["name"];
  $filep = $_FILES["vid"]["tmp_name"];
  $type = $_FILES["vid"]["type"];
  
  $upload = ftp_put($conn_id, $dest, $filep, FTP_BINARY) or die("Error");
  
  

$name = $_POST['vid_nanme'];

$code = '

<div id="mediaspace">This text will be replaced</div>

<script type="text/javascript">
  jwplayer("mediaspace").setup({
    "flashplayer": "player.swf",
    "file": "vid/' . $dest . '",
    "controlbar": "bottom",
    "width": "470",
    "height": "320"
  });
</script>';



mysql_query("INSERT INTO vid_detail (name, code) VALUES ('$name', '$code')") or die(mysql_error());

header("location:index.php");
}
  
<html>
<head>
<script type='text/javascript' src='jwplayer.js'></script>
<title>Video Uploader</title>
</head>
<body>
<h1>Video Uploader</h1>
<form method='post' enctype='multipart/form-data'>
Name:<input type='text' name='vid_name'><br />
Video: <input type='video' name='vid'><br />
<input type='submit'>
<hr />
<h3>View Videos</h3>
<?php
$result = mysql_query("SELECT * FROM vid_detail");
while($row = mysql_fetch_array($result)){
$name = $row['name'];
$vid_code = $row['code'];
echo'<h3>' . $name . '</h3><br />' . $vid_code . '<br />';
}
</body>
</html>