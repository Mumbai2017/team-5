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
		   $json['success']=1;
           return $json;
    }
    else
    {
		   $json['success']=0;
           return $json;
    }

}

}
else{
  header("Location:../login.html");
}


?>

