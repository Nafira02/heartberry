<?php
// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'test', $link );
// Fetch the data
$query = "
  SELECT *
  FROM my_chart_data
  ORDER BY category ASC";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

//Print out rows
$prefix = '';
echo "[n";
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $prefix . " {";
  echo '  "category": "' . $row['category'] . '",' . "";
  echo '  "value1": ' . $row['value1'] . ',' . "";
  echo '  "value2": ' . $row['value2'] . '' . "";
  echo " }";
  $prefix = ",";
}
echo "n]";

// Close the connection
mysql_close($link);


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

  // parse and return the output
  return eval(request.responseText);
};
?>