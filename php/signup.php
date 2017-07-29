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
  $loginid = $_POST['logind'];
  $password = $_POST['password'];
  $contact=$_POST['phone'];
  $role=$_POST['role'];
 # $mid=$_POST['mid'];
  $userObject = new User();
  $hashed_password = md5($password);
  $json_registration = $userObject->createNewRegisterUser($loginid,$hashed_password,$name,$email,$contact,$mid,$role);


       if($json_registration['success']==1)
       {
           header("Location:../blankpage.php");         //have to back the changes
       }
       else
       {
           header("Location:../register.html");
       }




}
else {
  header("Location:../register.html");
}

?>
