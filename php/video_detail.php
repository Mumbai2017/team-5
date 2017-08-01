<?php  

$teacherid="";
$filename="";

if(isset($_POST['username']))   // getting the json data from php 
{
	$obj = json_decode($_POST['username']);
	//echo $obj->{'username'};
	$teacherid=$obj->{'username'};
}


if(isset($_POST['file_name']))   // getting the json data from php 
{
	$obj = json_decode($_POST['file_name']);
	//echo $obj->{'username'};
	$filename=$obj->{'file_name'};
}

 $url="uploads/";
 
 $con=mysqli_connect('localhost','root','','team-5');
 $sql="Insert into video values(1,$filename,$teacherid,$url)"; 

 $result=mysqli_query($con,$sql);


 header("HTTP/1.1 200 OK");
 header("Status: 200 All rosy");


?>
