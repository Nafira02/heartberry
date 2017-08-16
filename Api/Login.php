<?php
 		
 		$dbhost = '127.0.0.1';
         $dbuser = 'root';
         $dbpass = '';
         $db = 'heartberry';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

 
		$name = $_POST['name'];
		$born = $_POST['born'];
		
		 
		$sql = "select * from elderly where name='$name' and DATE_FORMAT(born,'%d-%m-%Y')='$born'";
 
		$res = mysqli_query($conn,$sql);
		 
		$check = mysqli_fetch_array($res);
		$status=""; 

		if(isset($check)){
		$status=array("status"=>"success");
			// json echo 'success';
		}else{
		$status=array("status"=>"failure");
		}
		echo json_encode($status);
		mysqli_close($conn);
?>