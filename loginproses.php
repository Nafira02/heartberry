<?php
session_start();
$_SESSION['sesi']	= NULL;

include "config.php";

$username	= isset($_POST['username']) ? $_POST['username'] : "";
$pass	= isset($_POST['pass']) ? $_POST['pass'] : "";


$qry	= mysql_query("SELECT * FROM user WHERE username = '$username' AND pass = '$pass'");
$sesi	= mysql_num_rows($qry);

if ($sesi == 1) {
	$data_admin	= mysql_fetch_array($qry);
	
	$_SESSION['sesi'] = $data_admin['username'];
	
	echo "<script>alert('Log in Success. Username : $sesi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=linechart.php?user=$sesi'>";

} else {
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	echo "<script>alert('Invalid username and password');</script>";
}

?>