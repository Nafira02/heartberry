<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="refresh" content="1">
<title>Counter Suara</title>
</head>
<body >
<div class='hdr'>
<div class='textcenter'>
<font face='Arial' size='20px' color='White'>Jumlah Suara Masuk</font>
</div>
</div>

<div class='boxCounter'>
<div class='textcenterCounter'>
<?php
mysql_connect("localhost","root","");
mysql_select_db("db_pilketumws");
$query=mysql_query("SELECT count(id_pilih) as jumlah FROM pilih");
while ($row=mysql_fetch_array($query)){
			$jumlah=$row['jumlah'];
			}
?>
<font face='Arial'  color='#2C3E50'><?php echo $jumlah;?></font>
</div>
</div>
<br>
<br>
<div class="cntr">
<a href="hasil.php"><Button align="center" class='f_submit'>
Hitung
</Button>
</a>
</div>

</body>
</html>