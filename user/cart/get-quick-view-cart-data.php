<?php
require '../../config/constants.php';

$userID         = $_SESSION['id'];
//
$sql_count_prod = "SELECT * FROM cart WHERE userID='$userID';";
$num_prod       = $conn->query($sql_count_prod)->num_rows;

//
$sql_data_qcart = "SELECT products.productName,price,image FROM cart,products WHERE cart.userID='$userID' AND cart.productID=products.productID ORDER BY time_add DESC LIMIT 0,5;";
$res_data_qcart = $conn->query($sql_data_qcart);

?>

<p type="button" class="bi bi-cart-fill fs-4"><span class="fs-5">Giỏ hàng</span></p>
<p id="count-cart"><?php echo $num_prod; ?></p>
<div class="quick-cart-list text-dark container-fluid px- mb-0">
    <div class="text-muted fs-6 mb-3">
        Sản phẩm mới thêm
        <!-- <hr class="mt-0"> -->
    </div>
    <?php
    while ($res = $res_data_qcart->fetch_assoc()) {
        $prodName = $res['productName'];
    ?>
        <div style="width: 100%;" class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <img src="<?php echo SITEURL ?>assets/img/products/<?php echo explode(",", $res['image'])[0]; ?>" alt="" class="product-avatar-list" style="width: 50px;">
                <span class="quick-produc-name">
                    <?php
                    if (strlen($prodName) > 35) {
                        echo substr($prodName, 0, 35) . "...";
                    }else{
                        echo $prodName;
                    }
                    ?>
                </span>
            </div>
            <span class="text-danger fs-6 quick-product-price"><sup><u>đ</u></sup><?php echo number_format($res['price'], 0, '.', '.') ?></span>
        </div>
    <?php
    }

    ?>
    <!--  -->
    <div class="d-flex justify-content-between align-items-center">
        <p class="text-muted mb-2" style="font-size: 15px;"><?php echo $num_prod; ?> Sản phẩm trong giỏ hàng</p>
        <a href="<?php echo SITEURL ?>user/cart" class="btn btn-danger mb-3">Xem giỏ hàng</a>
    </div>
</div>

<?php


?>