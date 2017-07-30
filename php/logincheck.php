<?php

require_once '../include/user.php';

$loginid = "";
$password= "";

if(isset($_POST['submit']))
{


	$loginid = $_POST['login'];


    $password = $_POST['password'];


	
$userObject = new User();

if(!empty($loginid) && !empty($password)){

    $role='mentor';
  	$hashed_password = md5($password);
    $json_array = $userObject->loginUsers($loginid, $hashed_password,$role);

    if($json_array['success']==1)
    {
        header("Location:../html/mentordashboard.php");        //TechRaY have to make changes here
    }
    else
    {
        echo "<script>alert('Invalid Username Or Password');
        window.location = '../html/mentorlogin.html';
        </script>";

    }

}

}
else{
  header("Location:../login.html");
}


?>
