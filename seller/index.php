<?php
include "../config/constants.php";
include "./partials/header.php";

?>



<!-- Content start-->

<!--  -->
<div class="col-md-12 mt-2 mb-3 nav-page">
    <h5 class="text-muted"><a href="">Kênh người bán</a> / </span><a href="">Thống kê</a></h5>
</div>
<!--  -->
<h1 class="text-muted">Thống kê</h1>

<div class="container-fluid px-0">
    <div class="row me-0 d-flex justify-content-around">
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <h2 class="card-title d-inline">0</h2>
                <i class="bi bi-clipboard2-plus icon pt-0"></i>
            </div>
            <h6 class="card-subtitle me-auto mt-3">Đơn hàng mới trong ngày</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">

                <h2 class="card-title d-inline">0</h2>
                <i class="bi-hourglass-split icon"></i>
            </div>
            <h6 class="card-subtitle me-auto mt-3">Chờ xác nhận</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">

                <h2 class="card-title d-inline">0</h2>
                <img src="./assets/img/carry-box-icon.png" class="icon" alt="">
            </div>
            <h6 class="card-subtitle me-auto mt-2">Chờ lấy hàng</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">

                <h2 class="card-title d-inline">0</h2>
                <i class="bi bi-clipboard-check icon"></i>
            </div>
            <h6 class="card-subtitle me-auto mt-2">Đã xử lý</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <h2 class=" ms-1card-title d-inline">0</h2>
                <img src="./assets/img/refund-icon-1.jpg" class="icon" alt="" style="width: 50px;">
                <!-- <i class="fas icon fs-2"></i> -->
            </div>
            <h6 class="card-subtitle me-auto mt-2">Trả hàng / Hoàn tiền</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <h2 class=" ms-1card-title d-inline">0</h2>
                <i class="fa-regular fa-calendar-xmark icon"></i>
            </div>
            <h6 class="card-subtitle me-auto mt-2">Đơn hủy</h6>
        </div>

        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <?php
            //Sql Query 
            $sql_products_run_out = "SELECT * FROM products WHERE stock = 0 and userID = '{$_SESSION['userID']}'";
            //Execute Query
            $res_products_run_out = $conn->query($sql_products_run_out);
            //Count Rows
            $count_products_run_out = $res_products_run_out->num_rows;
            ?>
            <div class="card-body">
                <h2 class=" ms-1card-title d-inline"><?php echo $count_products_run_out ?></h2>
                <img src="./assets/img/out-product-icon.png" alt="" class="icon">
            </div>
            <h6 class="card-subtitle me-auto mt-2">Sản phẩm hết hàng</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <?php
            //Sql Query 
            $sql_products_locked = "SELECT * FROM products WHERE status = '3' and userID = '{$_SESSION['userID']}'";
            //Execute Query
            $res_products_locked = $conn->query($sql_products_locked);
            //Count Rows
            $count_products_locked = $res_products_locked->num_rows;
            ?>
            <div class="card-body">
                <h2 class=" ms-1card-title d-inline"><?php echo $count_products_locked ?></h2>
                <img src="./assets/img/lock-product-icon.png" alt="" class="icon">
            </div>
            <h6 class="card-subtitle me-auto mt-2">Sản phẩm bị khóa</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <?php
            //Sql Query 
            $sql_products = "SELECT * FROM products WHERE userID = '{$_SESSION['userID']}'";
            //Execute Query
            $res_products = $conn->query($sql_products);
            //Count Rows
            $count_products = $res_products->num_rows;
            ?>
            <div class="card-body">
                <h2 class=" ms-1card-title d-inline"><?php echo $count_products ?></h2>
                <img src="./assets/img/product-icon.png" alt="" class="icon">
            </div>
            <h6 class="card-subtitle me-auto mt-2">Sản phẩm</h6>
        </div>
    </div>
</div>
<!--  -->

<!--  -->
<!-- Lấy ngày tháng hiện tại -->
<?php
  $today = date("d/m/Y");
?>
<div class="col-md-12 alan shadow">
    <h3 class="mt-2 ms-3">Phân tích bán hàng <span class="fs-6 text-muted">(Hôm nay <?php echo $today ?> GMT+7)</span></h3>
    <div class="col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
    </div>
</div>
<!--  -->

<!-- Content end-->



<?php
include "./partials/footer.php";
?>