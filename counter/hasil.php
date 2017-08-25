<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/dropdown.css" type="text/css">
<script src="js/Chart.js"></script>
</head>

<body>
<?php 
//include "cek_login.php";
?>
<?php
mysql_connect('localhost','root','');
mysql_select_db('db_pilketumws');
$query=mysql_query("SELECT kandidat.nama as nama,kandidat.no_kandidat,COUNT(pilih.id_kandidat)as jumlah FROM `pilih`RIGHT JOIN kandidat ON kandidat.id_kandidat=pilih.id_kandidat group by kandidat.nama ORDER BY no_kandidat ASC");
$q=mysql_query("SELECT kandidat.nama as nama,kandidat.no_kandidat,COUNT(pilih.id_kandidat)as jumlah FROM `pilih`RIGHT JOIN kandidat ON kandidat.id_kandidat=pilih.id_kandidat group by kandidat.nama ORDER BY no_kandidat ASC");		
$r=mysql_query("SELECT kandidat.nama as nama,kandidat.no_kandidat,COUNT(pilih.id_kandidat)as jumlah FROM `pilih`RIGHT JOIN kandidat ON kandidat.id_kandidat=pilih.id_kandidat group by kandidat.nama ORDER BY no_kandidat ASC");
$jumlahPemilih=mysql_query("SELECT Sum(pl.jumlah)as total FROM (SELECT kandidat.nama as nama,kandidat.no_kandidat,COUNT(pilih.id_kandidat)as jumlah FROM `pilih`RIGHT JOIN kandidat ON kandidat.id_kandidat=pilih.id_kandidat group by kandidat.nama ORDER BY no_kandidat ASC)pl");
?>
<div class="header">
<div class="left">
<img src="image/lg.png" width="175px" height="95px">
</div>
<div class="center">
<font face="Calibri" size="20px" color="White">PILKETUM WSEC 2015</font>

</div>
<div class='d'>
<!--<nav>
	<ul>
		<li><a href="dashboaradmin.php">Beranda</a></li>
		<li><a href="#">Kandidat</a>
			<ul>
					<li><a href="input_kandidat.php">Input</a></li>
				<li><a href="list_kandidat.php">List</a></li>
				
			</ul>
		</li>
		<li><a href="#">Pemilih</a>
			<ul>
				<li><a href="input_pemilih.php">Anggota</a>
						<ul>
						<li><a href="input_pemilih.php">Input</a></li>
						<li><a href="list_pemilih.php">List</a></li>
					</ul>
				</li>
				<li><a href="list_pemilih.php">Alumni</a>
				<ul>
						<li><a href="input_alumni.php">Input</a></li>
						<li><a href="list_alumni.php">List</a></li>
					</ul>
				</li>
				<li><a href="list_pemilih.php">Dosen</a>
				<ul>
						<li><a href="input_dosen.php">Input</a></li>
						<li><a href="list_dosen.php">List</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="pageHasil.php">Hasil</a>
		   
				</li>
	</ul>
</nav>-->
</div>
</div>
<div class="underheader">


<font color="white" face="Arial" size="2px" ><!---Hello, Admin &nbsp; --><a href="logout.php"><!-- Logout---></a></font>

</div>


<div class="boxProfil">
<table>
<form action="hasil.php" >
	<th colspan="3">
		
		<p> jumlah Suara</p>
	
	</th>
	<tr>
		<td  >

		</tD>
		<td  >

		</tD>
		
		<td  >
	
		</tD>
		
	</tR>
	<tr>
	<td  bgcolor="Mediumaquamarine">
		No
		</tD>
		<td  bgcolor="Mediumaquamarine">
		Nama kandidat
		</tD>
		
		<td bgcolor="Mediumaquamarine" >
		Jumlah
		</tD>
		
	</tR>
	<?php
	while ($row=mysql_fetch_array($query)){
	?>
	<tr>
	<td>
		<?php echo $row['no_kandidat'] ;?>
		</tD>
		<td>
		<?php echo $row['nama'] ;?>
		</tD>
		
		<td >
		<?php echo $row['jumlah'] ;?>
		</tD>
		
	</tR>
	<?php
}
	?>
	
	
	<tr>
		<td colspan=2 >
		<b>Jumlah Total Suara<b>
		</tD>
		<?php
		while ($row=mysql_fetch_array($jumlahPemilih)){
			$t=$row['total'];
		}
		?>
		<td  >
		<b><?php echo $t ;?></b>
		</tD>
		
	</tR>
	<tr>
		<td  colspan="2">
		<a href="hasil.php"><button class="form_submit">Hitung</button></a>
		</tD>
		
		
		
	</tR>

</form>
</table>

</div>

<?php 
	$d =50;

	?>
		<div style="width: 45%;  margin:auto; margin-top:-250; margin-left:490">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

 var d = <?php echo "$d;"; ?>;
	var barChartData = {
		labels : [
			<?php
				while ($row=mysql_fetch_array($r)){
						$s=$row['nama'] ;
				echo "'$s'" ;
				//echo $row['nama']."";
				echo ",";
				
				}
				?>
		
		//'Sony','Arif','Anggi',
		
		],
		datasets : [
			{
				/*fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",*/
				fillColor : "rgba(139,135,169,0.5)",
				strokeColor : "rgba(139,135,169,0.8)",
				highlightFill: "rgba(139,135,169,0.75)",
				highlightStroke: "rgba(139,135,169,1)",
				
				data : [
				<?php
				while ($row=mysql_fetch_array($q)){
	
				//echo $row['jumlah']." ,";
				echo $row['jumlah'];
				echo ",";
				
				}
				?>
				]
			},
		
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	



<!---<div class="footer"><p>Copyright &copy; admin WSEC 2015 - All Rights Reserved</p></div>--->

</body>
</html>