<?php


// $mysqli = new mysqli("127.0.0.1", "root", "", "heartberry");
// if ($mysqli->connect_errno) {
//     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }else{
// 	echo "connected";
// }
// echo $mysqli->host_info . "\n";


	// echo phpinfo();
	// echo mysqli_info(0);
    // $mysqli = new mysqli("localhost:8080", "root", "", "heartberry");

		 $dbhost = 'http://192.168.43.57:81';
         $dbuser = 'root';
         $dbpass = '';
         $db = 'hbms';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);


         $sql="SELECT *,TIME(date)as waktu  FROM elderly e join heartbeat h on e.id_elderly=h.id_elderly where DATE(date)=DATE(NOW()) and e.id_elderly=10 ORDER by date DESC limit 1";
        
        $result=mysqli_query($conn,$sql);


        // $json = array();
        
		
		
		while($row = mysqli_fetch_array($result))     
		 {
		    $json= array(
		     'id_elderly' => $row['id_elderly'],
		     'name' => $row['name'],
		     'born' => $row['born'],
		     'room' => $row['room'],
		     'waktu' => $row['waktu'],
		     'heartbeat' => $row['heartbeat'],
		     'kondisi' => $row['kondisi'],
		     'status' => $row['status']
		    );
		}
		// $data = array("data"=>$json);
		
		$jsonstring = json_encode($json);
		echo $jsonstring;

         
?>