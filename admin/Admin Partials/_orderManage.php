<?php
    include '_dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['updateStatus'])) {
        $orderID = $_POST['orderID'];
        $status = $_POST['status'];

        $sql = "UPDATE `orders` SET `orderStatus`='$status' WHERE `orderID`='$orderID'";   
        $result = mysqli_query($con, $sql);
        if ($result){
            echo "<script>alert('Успешно обновлено');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('Ошибка');
                window.location=document.referrer;
                </script>";
        }
    }
    
   
   
}

?>