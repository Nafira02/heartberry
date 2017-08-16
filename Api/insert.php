<?php
		$dbhost = '127.0.0.1';
         $dbuser = 'root';
         $dbpass = '';
         $db = 'heartberry';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

		// $id = mysql_real_escape_string($_GET['id']);
		// $id = $_GET['id'];
		// $rate = $_GET['rate'];
         $id = $_POST['id'];
		$rate = $_POST['rate'];


		// $id = 10;
		// $rate = 99;
		date_default_timezone_set("America/New_York");
		$date= DATE("Y-m-d h:i:s");

		// $sql = "INSERT INTO heartbeat VALUES (NULL,".$id.",".$date.",".$rate.",'good')";
		$sql ="INSERT INTO heartbeat (`id_hb`, `id_elderly`, `date`, `heartbeat`, `kondisi`)
		 VALUES (NULL, '".$id."', '".$date."', '".$rate."', 'bagus')";

		$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

		if($res){
			echo "Success";
		}else{
			echo "Failure";
		}

?>