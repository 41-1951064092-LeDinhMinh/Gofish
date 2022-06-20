<?php
include "../../config/constants.php";


// Check
if (isset($_GET['productid'])) {
    $prodID = $_GET['productid'];
    $userIDPr = $_SESSION['userID'];

    $sql = "DELETE FROM products WHERE productID='$prodID' AND userID='$userIDPr';";
    $res = $conn->query($sql);
    if ($res->num_rows == 0) {
        $_SESSION['deleteProdSucsess'] = "Đã <strong>xóa</strong> sản phẩm <strong> có mã: ".$prodID."</strong> Thành công!";
        header("location:" . SITEURL . "seller/products/delete-product.php");
    } else {
        include "../partials/header.php";
        $prodInf = $res->fetch_assoc();
    }
    //
}

?>
