<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include('_dbconnect.php');
	$userName = $_POST["userName"];
	$firstName = $_POST["firstName"];
	$secondName = $_POST["secondName"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
	// Check username exists
	$existSql = "SELECT * FROM `users` WHERE userName = '$userName'";
	$result = mysqli_query($con, $existSql);
	$numExistRows = mysqli_num_rows($result);
	if ($numExistRows > 0) {
		$showError = "Логин не уникален!";
		header("Location: /index.php?signupsuccess=false&error=$showError");
	} else {
		if (($password == $cpassword)) {
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO `users` ( `userName`, `firstName`, `secondName`, `email`, `password`, `joinDate`) VALUES ('$userName', '$firstName', '$secondName', '$email', '$hash', current_timestamp())";
			$result = mysqli_query($con, $sql);
			if ($result) {
				$showAlert = true;
				header("Location: /index.php?signupsuccess=true");
			}
		} else {
			$showError = "Пароли не совпадают!";
			header("Location: /index.php?signupsuccess=false&error=$showError");
		}
	}
}
