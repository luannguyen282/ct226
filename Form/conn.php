<?php
$con = new mysqli("localhost","root","","ct226");

if ($con -> connect_error) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
mysqli_set_charset($con, "utf8");

?>