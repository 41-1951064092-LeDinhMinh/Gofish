<?php
include "../../config/constants.php";

$userIDPr = $_SESSION['userID'];

$sql = "DELETE FROM products WHERE userID='$userIDPr';";
$res = $conn->query($sql);
if ($res->num_rows == 0) {
        $_SESSION['deleteAllProdSucsess'] = "Đã <strong>xóa</strong> toàn bộ sản phẩm mà bạn đã đăng bán sản phẩm <strong>Thành công!";
        header("location:" . SITEURL . "seller/products/delete-product.php");
} else {
    include "../partials/header.php";
    $prodInf = $res->fetch_assoc();
}

?>
