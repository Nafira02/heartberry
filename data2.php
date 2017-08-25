<?php
// Connect to MySQL
$link = mysql_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Select the data base
$db = mysql_select_db( 'hbms', $link );
if ( !$db ) {
  die ( 'Error selecting database \'hbms\' : ' . mysql_error() );
}

// Fetch the data
//$query = "
//  SELECT *,TIME(date) as waktu
//  FROM heartbeat
//  ORDER BY date ASC";

$query="
SELECT *,TIME(date) as waktu
  FROM heartbeat where id_elderly=20
  ORDER BY date ASC 
  ";
$result = mysql_query( $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "waktu": "' . $row['waktu'] . '",' . "\n";
  echo '  "heartbeat": ' . $row['heartbeat'] . ',' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysql_close($link);
?>