<?php
# USEFUL FUNCTIONS

function connect_db($db)
{
  //Connects to DDBB WakeTeam
  $conn_string = "host=postgres port=5432 dbname=$db user=WakeTeam password=WakeDP1";
  /* Create connection */
  $conn = pg_connect($conn_string);
  // Check connection
  if ($conn == FALSE) {
    die("Connection failed");
  }
  return $conn;
}
