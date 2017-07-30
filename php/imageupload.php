<?php
 
 $con=mysqli_connect('localhost','root','','team-5');
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $name = $_POST['name'];
 
 $sql ="SELECT pid FROM plans ORDER BY pid ASC";
 
 $res = mysqli_query($con,$sql);
 $id = 0;
 
 while($row = mysqli_fetch_array($res)){
 $id = $row['id'];
 }
 
 $path = "../uploads/$id.png";
 
 $actualpath = "$path";   // currrentky hooking up for localhost
 
 $sql = "INSERT INTO plans VALUES ('$name','$actualpath')";
 
 if(mysqli_query($con,$sql)){
   
	header("HTTP/1.1 200 OK");
	header("Status: 200 All rosy");
 
 }
 
 mysqli_close($con);
 }else
 {
		header("HTTP/1.1 404 false");
		header("Status: 404 All rosy");
 
}

?>