<?php

$con=mysqli_connect("localhost","comumlay","","ComuMart");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// mysqli_close($con);

?>
