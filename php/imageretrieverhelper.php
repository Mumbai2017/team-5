<?php
 
 $con=mysqli_connect('localhost','root','','team-5');
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
	$userid = $_POST['id'];
    $sql="Select * from plans where uid=".$userid;
	
	
	$result=mysqli_query($con,$sql);
	
    $props[];   //will help in retrieving the plan through its data.	
	
	while($row=myqsl_fetch_array($result))
	{
		$rowk = array();
		$rowk['url'] = $row[1];
		$rowk['data'] = $row[3];
		$props= $rowk;
	}
	
	return $props;

?>	     
