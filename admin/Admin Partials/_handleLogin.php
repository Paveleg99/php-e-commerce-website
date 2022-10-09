<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include '_dbconnect.php';
	$userName = $_POST["userName"];
	$password = $_POST["password"];

	$sql = "Select * from users where userName='$userName'";
	$result = mysqli_query($con, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 1) {
		$row = mysqli_fetch_assoc($result);
		$userType = $row['userType'];
		if ($userType == 1) {
			$userID = $row['userID'];
			if (password_verify($password, $row['password'])) {
				session_start();
				$_SESSION['adminloggedin'] = true;
				$_SESSION['adminusername'] = $userName;
				$_SESSION['adminuserID'] = $userID;
				header("location: /admin/index.php?loginsuccess=true");
				exit();
			} else {
				header("location: /admin/login.php?loginsuccess=false");
			}
		} else {
			header("location: /admin/login.php?loginsuccess=false");
		}
	} else {
		header("location: /admin/login.php?loginsuccess=false");
	}
}
