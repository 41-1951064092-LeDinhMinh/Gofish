<?php
require '../../config/constants.php';

$userID         = $_SESSION['id'];
//
$sql_get_user_info = "SELECT * FROM users WHERE id='$userID'";
$res_user = $conn->query($sql_get_user_info)->fetch_assoc();
$userName = $res_user['fullname'];
$userPhone = $res_user['phone'];
$userAddr = $res_user['address'];
//
$sql_select_seller = "SELECT DISTINCT id,fullname FROM cart,products,users WHERE cart.productID=products.productID AND products.userID=users.id AND cart.userID='$userID' ORDER BY time_add DESC;";
$result_seller = $conn->query($sql_select_seller);
//

//
?>


<div class="col-md-12 mt-4 fs-1">
    <p class="bi bi-cart3 text-muted">Giỏ hàng</p>
</div>


<?php


if ($result_seller->num_rows > 0) {
?>
    <div class="col-md-12 col-lg-9 mb-5">
        <div class="prod-cart-info mb-4 col-md-12 bg-light d-flex align-items-center px-3 py-2">
            <div style="width: 40%;"><input id="btn-check-all-cart" class="me-1 form-check-input" type="checkbox" style="cursor: pointer;">Tất cả (0 sản phẩm)</div>
            <div style="width: 20%;">Đơn giá</div>
            <div style="width: 20%;">Số lượng</div>
            <div style="width: 20%;">Thành tiền</div>
            <i class="bi bi-trash text-muted fs-4 btn-clear-cart" type="button"></i>
        </div>
        <!-- Shop -->
        <?php
        while ($res_seller = $result_seller->fetch_assoc()) {
            // Get seller infor
        ?>
            <div class="prod-cart-info col-md-12 bg-light px-3 py-2 mb-4">
                <div class="col-md-12"><input class="btn-check-shop me-1 form-check-input" type="checkbox" style="cursor: pointer;">
                    <i class="bi bi-shop m-1"></i><?php echo $res_seller['fullname'] ?>
                </div>
                <!-- Product -->
                <?php
                $sql_get_prod_data = "SELECT products.productID,products.productName,price,image,stock,cart.quantity 
                FROM cart,products WHERE cart.userID='$userID' AND cart.productID=products.productID 
                AND products.userID='{$res_seller['id']}' ORDER BY time_add DESC;";
                $result_prod = $conn->query($sql_get_prod_data);
                while ($res_prod = $result_prod->fetch_assoc()) {
                    $amount = $res_prod['price'] * $res_prod['quantity'];
                ?>
                    <div class="prod-info mb-0 mt-3 col-md-12 bg-light d-flex d-flex align-items-center px-3 py-2">
                        <div style="width: 40%;" class="mb-4 d-flex align-items-center">
                            <input class="btn-check-product me-1 form-check-input" type="checkbox" style="cursor: pointer;" data-prodid="<?php echo $res_prod['productID'] ?>" data-amount="<?php echo $amount; ?>">
                            <img src="<?php echo SITEURL ?>assets/img/products/<?php echo explode(",", $res_prod['image'])[0]; ?>" alt="" class="product-avatar-list" style="width: 70px;">
                            <span class="quick-produc-name ms-2 pe-3"><?php echo $res_prod['productName']; ?></span>
                        </div>
                        <div class="mb-4" style="width: 20%;"><?php echo number_format($res_prod['price'], 0, '.', '.'); ?><u class="ms-1">đ</u></div>
                        <div style="width: 20%;">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link bi bi-dash-lg btn-decrease-cart" type="button" data-prodid="<?php echo $res_prod['productID'] ?>" data-prod_price="<?php echo $res_prod['price'] ?>" data-prod_stock="<?php echo $res_prod['stock']; ?>"></a>
                                </li>
                                <li class="page-item">
                                    <input type="text" class="page-link px-2 text-dark input-quantity-cart" autocomplete="off" data-prodid="<?php echo $res_prod['productID'] ?>" data-prod_price="<?php echo $res_prod['price'] ?>" data-prod_stock="<?php echo $res_prod['stock']; ?>" value="<?php echo $res_prod['quantity']; ?>" style="width: 40px;">
                                </li>
                                <li class="page-item">
                                    <a class="page-link bi-plus-lg btn-increase-cart" type="button" data-prodid="<?php echo $res_prod['productID'] ?>" data-prod_price="<?php echo $res_prod['price'] ?>" data-prod_stock="<?php echo $res_prod['stock']; ?>"></a>
                                </li>
                            </ul>
                        </div>
                        <div style="width: 20%;" class="text-danger mb-4 amount" data-prodid="<?php echo $res_prod['productID'] ?>" data-amount="<?php echo $amount; ?>">
                            <?php
                            echo number_format($amount, 0, '.', '.');
                            ?>
                            <u>đ</u>
                        </div>
                        <div class="mb-4"><i type="button" class="bi bi-trash text-muted fs-5 btn-remove-cart" data-prodid="<?php echo $res_prod['productID'] ?>"></i></div>
                    </div>
                <?php } ?>
                <!-- Product -->
            </div>
        <?php } ?>
        <!-- Shop -->
    </div>
    <!--  -->
    <div class="col-md-12 col-lg-3">
        <div class="col-md-12 bg-light px-3">
            <div class="col-md-12 d-flex justify-content-between pt-2">
                <p class="text-muted">Giao tới</p>
                <a href="#" class="text-decoration-none">Thay đổi</a>
            </div>
            <div class="col-md-12">
                <strong><?php echo $userName; ?> | <?php echo $userPhone; ?></strong>
                <p class="text-muted mt-1 pb-4"><?php echo $userAddr; ?></p>
            </div>
        </div>
        <div class="col-md-12 bg-light px-3 mb-3">
            <div class="col-md-12 d-flex justify-content-between pt-2">
                <p class="">Khuyến mãi</p>
                <p class="text-muted">Có thể chọn(0) <i type="button" class="bi bi-info-circle"></i></p>
            </div>
            <div class="col-md-12 d-flex justify-content-center pb-4">
                <h3 class="text-muted">Không áp dụng</h3>
            </div>
        </div>
        <div class="col-md-12 bg-light px-3 mb-3">
            <div class="col-md-12 d-flex justify-content-between pt-2">
                <p>Số sản phẩm: </p>
                <p>3</p>
            </div>
            <hr>
            <div class="col-md-12 d-flex justify-content-between pt-2">
                <h4>Tạm tính: </h4>
                <div>
                    <h4 class="text-danger d-flex justify-content-end total-price">0<u class="ms-1">đ</u></h4>
                    <p class="fs-6">(Đã bao gồm VAT nếu có)</p>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-danger col-md-12 py-2 mb-3">
            <h4 class="mt-1">Tiếp tục</h4>
        </a>
    </div>


<?php
}

?>