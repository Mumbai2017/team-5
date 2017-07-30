<?php

require_once '../include/user.php';

$name="";
$loginid = "";
$password = "";
$contact="";
$mid="";
$email="";
$role="";
$hashed_password="";

if(isset($_POST['submit']))
{
 	$name = $_POST['name'];
  $loginid = $_POST['loginid'];
  $password = $_POST['password'];
  $contact=$_POST['phone'];
  $role=$_POST['role'];
  $email=$_POST['email'];
  $mid=$_POST['mid'];
  $userObject = new User();
  $hashed_password = md5($password);
  $json_registration = $userObject->createNewRegisterUser($loginid,$hashed_password,$name,$email,$contact,$mid,$role);


       if($json_registration['success']==1)
       {
           header("Location:../html/mentordashboard.php");         //have to back the changes
       }
       else
       {
           header("Location:../html/mentorlogin.html");
       }




}
else {
  header("Location:../register.html");
}

?>
