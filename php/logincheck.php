<?php

require_once '../include/user.php';

$loginid = "";
$password= "";

if(isset($_POST['submit']))
{

if(isset($_POST['loginid'])){
	$loginid = $_POST['EmailId'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}

	
$userObject = new User();

if(!empty($username) && !empty($password)){

  	$hashed_password = md5($password);
    $json_array = $userObject->loginUsers($username, $hashed_password);

    if($json_array['success']==1)
    {
        header("Location:../blankpage.php");        //TechRaY have to make changes here
    }
    else
    {
        echo "<script>alert('Invalid Username Or Password');
        window.location = '../login.html';
        </script>";

    }

}

}
else{
  header("Location:../login.html");
}


?>
