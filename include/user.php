<?php

include_once 'db.php';

class User{
	
	private $db;
	private $db_table = "users";
	
	public function __construct(){
		$this->db = new DbConnect();
	}
	
	public function isLoginExist($username, $password,$role){		
				
		$query="";

		if($role=='teacher')		
		$query = "select * from " . $this->db_table . " where loginid = '$username' AND password = '$password' Limit 1";

        if($role=='mentor') 
        $query = "select * from mentor where loginid = '$username' AND password = '$password' Limit 1";	

		$result = mysqli_query($this->db->getDb(), $query);
		if(mysqli_num_rows($result) > 0){ 
			mysqli_close($this->db->getDb());
			return true;
		}		
		mysqli_close($this->db->getDb());
		return false;		
	}
	
	public function createNewRegisterUser($loginid,$password,$name,$email,$contact,$mid,$role){
        
        $query="";

		if($role=='teacher')
		$query = "insert into ". $this->db_table . "(loginid,password,name,email,phone,mid) values ('$loginid','$password','$name','$email','$contact','$mid')";

	   if($role=='mentor')
    	$query = "insert into mentor(loginid,password,name,email,phone) values ('$loginid','$password','$name','$email','$contact')";


		$inserted = mysqli_query($this->db->getDb(), $query);

		if($inserted == 1){
			$json['success'] = 1;									
		}else{
			$json['success'] = 0;
		}
		mysqli_close($this->db->getDb());
		return $json;
	}
	
	public function loginUsers($username, $password){
			
		$json = array();
		$canUserLogin = $this->isLoginExist($username, $password);
		if($canUserLogin){
			$json['success'] = 1;
		}else{
			$json['success'] = 0;
		}
		return $json;
	}

}


?>