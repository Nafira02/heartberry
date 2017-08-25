<!DOCTYPE html>
<html>
<head>
<link href="home/css/bootstrap.min.css" rel="stylesheet">
	<link href="home/css/font-awesome.min.css" rel="stylesheet">
	<link href="home/css/datepicker3.css" rel="stylesheet">
	<link href="home/css/styles.css" rel="stylesheet">
	<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="home/js/html5shiv.js"></script>
	<script src="home/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Heartberry</span>Admin</a>
						</div><!-- /.container-fluid -->
						
						<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			
		</div>
		
		<ul class="nav menu">
			<li><a href="linechart.php"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li><a href="index.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Charts</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Charts</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">						
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Heartberry</title>
</head>
<body>

  <!-- prerequisites -->
  <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="amcharts/amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

  <!-- cutom functions -->
  <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>

  <!-- chart container -->
  <div id="chartdiv" style="width: 700px; height: 350px;"></div>

  <!-- the chart code -->
  <script>
var chart;

// create chart
AmCharts.ready(function() {

  // load the data
  var chartData = AmCharts.loadJSON('data2.php');

  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.theme = "light"
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "waktu";
  chart.dataDateFormat = "YYY-mm-dd";

  
  // GRAPHS
  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "heartbeat";
  graph1.bullet = "round";
  graph1.bulletBorderColor = "#FFFFFF";
  graph1.bulletBorderThickness = 2;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  chart.addGraph(graph1);


  // CATEGORY AXIS
  

  // WRITE
  chart.write("chartdiv");
});

  </script>

</body>
</html>

