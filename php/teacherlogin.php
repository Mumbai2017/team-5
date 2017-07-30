<?php
require_once '../include/user.php';
//$con=mysqli_connect('localhost','root','','team-5');

$loginid="";
$password="";

if(isset($_POST['username']))   // getting the json data from php 
{
	$obj = json_decode($_POST['username']);
	$loginid=$obj->{'username'};
}

if(isset($_POST['password']))   // getting the json data from php 
{
	$obj = json_decode($_POST['password']);
	$password=$obj->{'password'};
}


	
$userObject = new User();

if(!empty($loginid) && !empty($password)){

    $role='teacher';
  	$hashed_password = md5($password);
    $json_array = $userObject->loginUsers($loginid, $hashed_password,$role);

    if($json_array['success']==1)
    {
			header("HTTP/1.1 200 OK");
			header("Status: 200 All rosy");
    }
    else
    {
		   
			header("HTTP/1.1 404 OK");
			header("Status: 404 All rosy");
    }

}

}
else{
  header("Location:../login.html");
}


?>

