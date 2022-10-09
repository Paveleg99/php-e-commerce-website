<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = "techmag";

$con = mysqli_connect($host, $user, $password, $database);
if ($con->connect_error) {
	echo "Fail " . $con->connect_error;
}
