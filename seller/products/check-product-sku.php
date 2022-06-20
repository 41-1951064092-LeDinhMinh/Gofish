<?php
include "../../config/constants.php";

if(isset($_POST['productSKU'])){
    $productSKU = $_POST['productSKU'];
    $userIDPr = $_SESSION['userID'];
    $msg = "";
    $sql_prod_sku = "SELECT * FROM products WHERE productSKU = '$productSKU' AND userID = '$userIDPr'";
    $res_productSKU = $conn->query($sql_prod_sku);
    echo $res_productSKU->fetch_assoc()['productSKU'];
}
else {
    header("location:" . SITEURL . "seller/");
}
?>