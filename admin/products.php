<?php
include "../config/constants.php";

include "./partials/loginCheck.php";

?> 




<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../seller/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../seller/assets/js/script.js"></script>
</head>

<body>
    <div class="container-fluid fixed-top">
        <div class="row">
            <div class="col-md-12 p-0">
                <!-- Navbars start -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <i id="btn-menu" class="bi bi-list me-3 fs-2" type="button"></i>
                        <a href="../">
                            <img src="../seller/assets/img/logo-1.png" alt="" class="logo">

                        </a>
                        <a class="navbar-brand me-auto" href="./admin.php">Trang Quản Trị</a>
                        <a class="navbar-brand ms-auto" href="#"><i class="bi bi-person-workspace me-2"></i><?php echo $_SESSION['adminName'] ?></a>
                    </div>
                </nav>
                <!-- Navbars end -->
            </div>
        </div>
    </div>

    <!--  -->

    <!-- Main start -->
    <div class="container-fluid main">
        <div class="row">

            <!-- Sidebar start -->
            <div class="container sidebar">
                <!-- Sidebar menu start-->
                <div class="sidebar-menu">
                    <ul class="">
                        <li>
                            <a href="account.php" class="nav-link link-dark">
                            <i class="bi bi-person-circle"></i>
                                <span class="sidebar-item-text">Quản lý tài khoản</span>
                            </a>
                        </li>
                        <hr>
                        <hr>
                        <li>
                            <a class="nav-link link-dark tour-btn" type="button" href="products.php">
                            <i class="bi bi-basket"></i>
                                <span class="sidebar-item-text ms-3 ">Quản lý sản phẩm</span>
                            </a>
                            
                        </li>
                        <hr style="width: 100%;">
                        <li>
                            <a href="./partials/logout.php" class="nav-link link-dark">
                                <i class="bi bi-box-arrow-right"></i>
                                <span class="sidebar-item-text">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Sidebar end -->

            <!-- Content start-->
            <div class="col main-right container-fluid row show">


<div class="col-md-12 mt-2 mb-3 nav-page">
    <h5 class="text-muted"><a href="../admin.php">Trang quản trị</a> / </span><a href="./products.php">Quản lý sản phẩm</a></h5>
</div>

<div class="col-md-12 manage-products shadow">
    <div class="col-md-12">
        <ul class="nav">
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "all" ? "active" : "") ?>">Tất cả bài đăng</a>
            </li>
        </ul>
        <hr class="mt-0">
    </div>

    <div class="col-md-12 products-search">
        <form>
            <div class="input-group  mb-3 ">
                <div class="col-md-8 mb-5  pe-4">
                    <div class="input-group ">
                        <select class="form-select select-ten">
                            <option value="0" selected>Tên sản phẩm</option>
                            <option value="1">Mã sản phẩm</option>
                        </select>
                        <input id="productNameSearch" type="text" class="form-control" placeholder="Nhập vào" >
                    </div>
                </div>
                <button class="btn btn-danger col-md-4 ms-auto  px-4" style="max-width: 150px; border-radius: 7px; max-height: 50px;">Tìm</button>
                <div class="col-md-8  pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3">Người đăng bán</span>
                        <input type="text" class="form-control" placeholder="Nhập vào" >
                    </div>
                </div>
                <button class="btn btn-secondary text-dark col-md-4 ms-auto  px-4" style="max-width: 150px; border-radius: 7px; max-height: 50px;">Nhập lại</button>
            </div>
        </form>
        <span class="mt-3 mb-3">
            <?php
                include "../config/session.php";
            ?>
        </span>
    </div>

    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-between">
            <?php
            //Sql Query 
            $sql_pd = "SELECT * FROM products";
            //Execute Query
            $res_pd = mysqli_query($conn,$sql_pd);
            //Count Rows
            $count_pd = mysqli_num_rows($res_pd);
            ?>
            <h3 class="ms-2" id="label-count-prod"><?php echo $count_pd ?> Sản phẩm </h3>
        </div>
        <!--  -->
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Người bán</th>
                    <th>Xem thông tin</th>
                </tr>
            </thead>
            <tbody id="table-products">
                <!--  -->
                <?php
                $sql = "SELECT users.username,products.productName,products.productID,products.image,products.status,products.stock FROM products,users where products.userid = users.id ";
                        $result = mysqli_query($conn,$sql);
                        //Bước 03: Xử lý kết quả truy vấn
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>
                                    <th class="row">
                                        <div style="max-width: fit-content;">
                                            <img src="../assets/img/products/<?php echo explode(",", $row['image'])[0]; ?>" alt="" class="product-avatar-list">
                                        </div>
                                        <div class="col row d-flex align-items-center">
                                            <?php
                                            if ($row['status'] == 1 and $row['stock'] > 0) {
                                            ?>
                                                <div class="col-md-12 produc-status-active">
                                                    Đang hoạt động
                                                </div>
                                            <?php
                                            }
                                            if ($row['status'] == 1 and $row['stock'] == 0) {
                                            ?>
                                                <div class="col-md-12 produc-status-out">
                                                    Hết hàng
                                                </div>
                                            <?php
                                            }
                                            if ($row['status'] == 3) {
                                            ?>
                                                <div class="col-md-12 produc-status-locked">
                                                    Bị khóa
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <div class="col-md-12">
                                                <b><?= $row['productName']; ?></b>
                                            </div>
                                        </div>
                                    </th>
                                    <th><?php echo $row['username']; ?></th>
                                    <th><a href="showDetail.php?id=<?php echo $row['productID']; ?>"><i class="bi bi-eye text-dark h4"></i></a></th>
                                </tr>
                    <?php
                            }
                        } 
                    ?> 
                <!--  -->
            </tbody>
        </table>
        <!--  -->
    </div>

</div>
<!-- Content end-->

<?php
include "../seller/partials/footer.php";
?>