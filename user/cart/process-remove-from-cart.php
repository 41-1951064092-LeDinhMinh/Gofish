<?php
require '../../config/constants.php';


if (isset($_POST['productID'])) {
    $userID    = $_SESSION['id'];
    $productID = $_POST['productID'];

    // SQL delete a product
    $sql = "DELETE FROM cart WHERE userID='$userID' AND productID='$productID';";
    $res = $conn->query($sql);
}
else if(isset($_POST['all'])){
    $userID    = $_SESSION['id'];

    // SQL delete all product
    $sql = "DELETE FROM cart WHERE userID='$userID';";
    $res = $conn->query($sql);
}
