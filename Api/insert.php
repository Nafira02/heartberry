<?php
		$dbhost = '127.0.0.1';
         $dbuser = 'root';
         $dbpass = '';
         $db = 'heartberry';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

		// $id = mysql_real_escape_string($_GET['id']);
		$id = 10;
		$rate = 88;
  //        $id = $_POST['id'];
		// $rate = $_POST['rate'];


		// $id = 10;
		// $rate = 99;
		date_default_timezone_set("America/New_York");
		$date= DATE("Y-m-d h:i:s");

		// $sql = "INSERT INTO heartbeat VALUES (NULL,".$id.",".$date.",".$rate.",'good')";
		$kondisi="";
		if($rate<68){
			$kondisi="very good";
		}elseif($rate>=68 && $rate<=75){
			$kondisi="good";
		}elseif($rate >=79 && $rate<=91 ){
			$kondisi="bad";
		}elseif($rate >=91){
			$kondisi="very bad";
		}

		$sql ="INSERT INTO heartbeat (`id_hb`, `id_elderly`, `date`, `heartbeat`, `kondisi`)
		 VALUES (NULL, '".$id."', '".$date."', '".$rate."', '".$kondisi."')";

		$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		if($res){
			echo "Success";
		}else{
			echo "Failure";
		}

?>