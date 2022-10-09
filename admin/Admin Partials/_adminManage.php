<?php
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['removeAdmin'])) {
		$userID = $_POST["userID"];
		$sql = "DELETE FROM `users` WHERE `userID`='$userID'";
		$result = mysqli_query($con, $sql);
		echo "<script>alert('Администратор удален!');
            window.location=document.referrer;
            </script>";
	}

	if (isset($_POST['createAdmin'])) {
		$userName = $_POST["userName"];
		$firstName = $_POST["firstName"];
		$secondName = $_POST["secondName"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$cpassword = $_POST["cpassword"];

		// Check whether this username exists
		$existSql = "SELECT * FROM `users` WHERE userName = '$userName'";
		$result = mysqli_query($con, $existSql);
		$numExistRows = mysqli_num_rows($result);
		if ($numExistRows > 0) {
			echo "<script>alert('Логин не уникален!');
                    window.location=document.referrer;
                </script>";
		} else {
			if (($password == $cpassword)) {
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO `users` ( `userName`, `firstName`, `secondName`, `email`, `userType`, `password`, `joinDate`) VALUES (' $userName', '$firstName', ' $secondName', '$email', '1', '$hash', current_timestamp())";
				$result = mysqli_query($con, $sql);
				if ($result) {
					echo "<script>alert('Учетная запись администратора успешно создана!');
                            window.location=document.referrer;
                        </script>";
				} else {
					echo "<script>alert('Ошибка! Попробуйте еще раз.');
                            window.location=document.referrer;
                        </script>";
				}
			} else {
				echo "<script>alert('Пароли не совпадают');
                    window.location=document.referrer;
                </script>";
			}
		}
	}

	if (isset($_POST['editAdmin'])) {
		$userID = $_POST["userID"];
		$firstName = $_POST["firstName"];
		$secondName = $_POST["secondName"];
		$email = $_POST["email"];

		$sql = "UPDATE `users` SET `firstName`='$firstName', `secondName`='$secondName', `email`='$email' WHERE `userID`='$userID'";
		$result = mysqli_query($con, $sql);
		if ($result) {
			echo "<script>alert('Профиль успешно изменен!');
                window.location=document.referrer;
                </script>";
		} else {
			echo "<script>alert('Ошибка! Попробуйте еще раз.');
                window.location=document.referrer;
                </script>";
		}
	}
}
