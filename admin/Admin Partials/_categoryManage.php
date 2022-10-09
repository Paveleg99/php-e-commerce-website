<?php
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['createCategory'])) {
		$name = $_POST["name"];

		$sql = "INSERT INTO `category` (`categoryName`) VALUES ('$name')";
		$result = mysqli_query($con, $sql);
		$catID = $con->insert_id;
		if ($result) {
			echo "<script>alert('Категория добавлена');
                window.location=document.referrer;
                </script>";
		} else {
			echo "<script>alert('Ошибка!');
                window.location=document.referrer;
                </script>";
		}
	}
	if (isset($_POST['removeCategory'])) {
		$catID = $_POST["catID"];
		$sql = "DELETE FROM `category` WHERE `categoryID`='$catID'";
		$result = mysqli_query($con, $sql);
		if ($result) {
			echo "<script>alert('Категория удалена');
                window.location=document.referrer;
                </script>";
		} else {
			echo "<script>alert('Ошибка!');
                window.location=document.referrer;
                </script>";
		}
	}
	if (isset($_POST['updateCategory'])) {
		$catID = $_POST["catID"];
		$catName = $_POST["name"];

		$sql = "UPDATE `category` SET `categoryName`='$catName' WHERE `categoryID`='$catID'";
		$result = mysqli_query($con, $sql);
		if ($result) {
			echo "<script>alert('Категория обновлена');
                window.location=document.referrer;
                </script>";
		} else {
			echo "<script>alert('Ошибка!');
                window.location=document.referrer;
                </script>";
		}
	}
}
