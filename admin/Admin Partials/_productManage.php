<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $categoryID = $_POST["categoryID"];
		$brandID = $_POST["brandID"];
        $price = $_POST["price"];

        $sql = "INSERT INTO `product` (`productName`, `productPrice`, `productDescription`, `categoryID`, `brandID`, `productAddDate`) VALUES ('$name', '$price', '$description', '$categoryID', '$brandID', current_timestamp())";   
        $result = mysqli_query($con, $sql);
        $productID = $con->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newName = $name ;
                $newfilename=$newName .".webp";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/diploma/assets/products/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Выберите изображение для загрузки.");
                        window.location=document.referrer;
                    </script>';
            }
        }
        else {
            echo "<script>alert('failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $productID = $_POST["productID"];
		$productName = $_POST["productName"];
        $sql = "DELETE FROM `product` WHERE `productID`='$productID'";   
        $result = mysqli_query($con, $sql);
        $filename = $_SERVER['DOCUMENT_ROOT']."/diploma/assets/products/".$productName.".webp";
        if ($result){
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
            </script>";
        }
        else {
            echo "<script>alert('failed');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
		$productID = $_POST["productID"];
		$productName = $_POST["name"];
		$productPrice = $_POST["price"];
		$productCategoryID = $_POST["catId"];
		$productBrandID = $_POST["brandId"];
		$productDesc = $_POST["desc"];

        $sql = "UPDATE `product` SET `productName`='$productName', `productPrice`='$productPrice', `productDescription`='$productDesc', `categoryID`='$productCategoryID', `brandID`='$productBrandID' WHERE `productID`='$productID'";   
        $result = mysqli_query($con, $sql);
        if ($result){
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['updateItemPhoto'])) {
		$productName = $_POST["productName"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = $productName;
            $newfilename=$newName .".webp";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/diploma/assets/products/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        }
        else{
            echo '<script>alert("Выберите изображение для загрузки.");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>