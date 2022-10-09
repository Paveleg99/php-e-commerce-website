<?php
include '_dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userID = $_SESSION['userID'];
	if (isset($_POST['addToCart'])) {
		$itemID = $_POST["itemID"];
		// Проверка на нахождение в корзине
		$existSql = "SELECT * FROM `cart` WHERE productID = '$itemID' AND `userID`='$userID'";
		$result = mysqli_query($con, $existSql);
		$numExistRows = mysqli_num_rows($result);
		if ($numExistRows > 0) {
			echo "<script>alert('Продукт уже добавлен в корзину!');
                    window.history.back(1);
                    </script>";
		} else {
			$sql = "INSERT INTO `cart` (`productID`, `cartItemQuantity`, `userID`, `addDate`) VALUES ('$itemID', '1', '$userID', current_timestamp())";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>
                    window.history.back(1);
                    </script>";
			}
		}
	}
	if (isset($_POST['removeItem'])) {
		$itemID = $_POST["itemID"];
		$sql = "DELETE FROM `cart` WHERE `productID`='$itemID' AND `userID`='$userID'";
		$result = mysqli_query($con, $sql);
		echo "<script>
                    window.history.back(1);
                    </script>";
	}

	if (isset($_POST['removeAllItem'])) {
		$sql = "DELETE FROM `cart` WHERE `userID`='$userID'";
		$result = mysqli_query($con, $sql);
		echo "<script>alert('Корзина очищена');
                window.history.back(1);
            </script>";
	}

	if (isset($_POST['createOrder'])) {
		$amount = $_POST["amount"];
		$quant = $_POST["quant"];
		$region = $_POST["region"];
		$city = $_POST["city"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		$postIdx = $_POST["postIdx"];
		$addressFul = "{$region}, {$city}, {$address}";
		$phoneNumb = "+79{$phone}";

		$sql = "INSERT INTO `orders` (`userID`, `address`, `postIndex`, `phoneNumber`, `orderAmount`, `orderQuantity`, `orderStatus`, `orderDate`) VALUES ('$userID', '$addressFul', '$postIdx', '$phoneNumb', '$amount', '$quant', '0', current_timestamp())";
		$result = mysqli_query($con, $sql);
		$orderID = $con->insert_id;
		if ($result) {
			$addSql = "SELECT * FROM `cart` WHERE userID='$userID'";
			$addResult = mysqli_query($con, $addSql);
			while ($addrow = mysqli_fetch_assoc($addResult)) {
				$productID = $addrow['productID'];
				$itemQuantity = $addrow['cartItemQuantity'];
				$itemSql = "INSERT INTO `orderitems` (`orderID`, `productID`, `orderItemQuantity`) VALUES ('$orderID', '$productID', '$itemQuantity')";
				$itemResult = mysqli_query($con, $itemSql);
			}
			$deleteSql = "DELETE FROM `cart` WHERE `userID`='$userID'";
			$deleteResult = mysqli_query($con, $deleteSql);
			echo '<script>alert("Спасибо за заказ! Номер вашего заказа - ' . $orderID . '.");
                    window.location.href="diploma/index.php";  
                    </script>';
			exit();
		}
	}


	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$productID = $_POST['productID'];
		$qty = $_POST['quantity'];
		$updatesql = "UPDATE `cart` SET `cartItemQuantity`='$qty' WHERE `productID`='$productID' AND `userID`='$userID'";
		$updateresult = mysqli_query($con, $updatesql);
	}
}
