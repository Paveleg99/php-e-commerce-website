<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include('_dbconnect.php');
	$userName = $_POST["loginusername"];
	$password = $_POST["loginpassword"];

	$sql = "Select * from users where userName='$userName'";
	$result = mysqli_query($con, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 1) {
		$row = mysqli_fetch_assoc($result);
		$userID = $row['userID'];
		if (password_verify($password, $row['password'])) {
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['userName'] = $userName;
			$_SESSION['userID'] = $userID;
			header("location: /index.php?loginsuccess=true");
			exit();
		} else {
			header("location: /index.php?loginsuccess=false");
		}
	} else {
		header("location: /index.php?loginsuccess=false");
	}
}
