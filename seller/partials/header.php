<?php

//
$_SESSION['userID'] = $_SESSION['id'];


include dirname(__FILE__) . '/login-check.php';


//Sql Query 
//$sql_partner = "SELECT * FROM doitac Where maCongTy = '{$_SESSION['partnerAccount']}'";
//Execute Query
// $resultInfoPartner = $conn->query($sql_partner);
// $infoPartner = $resultInfoPartner->fetch_assoc();


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
    <link rel="stylesheet" href="<?php echo SITEURL ?>seller/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo SITEURL ?>seller/assets/js/script.js"></script>
</head>

<body>
    <div class="container-fluid fixed-top">
        <div class="row">
            <div class="col-md-12 p-0">
                <!-- Navbars start -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <i id="btn-menu" class="bi bi-list me-3 fs-2" type="button"></i>
                        <a href="<?php echo SITEURL ?>">
                            <img src="<?php echo SITEURL ?>seller/assets/img/logo-1.png" alt="" class="logo">

                        </a>
                        <a class="navbar-brand me-auto" href="<?php echo SITEURL ?>seller/">Kênh người bán</a>
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
            <div class="container sidebar sidebar-show">
                <!-- Sidebar menu start-->
                <div class="sidebar-menu">
                    <ul class="">
                        <li>
                            <a href="<?php echo SITEURL ?>seller" class="nav-link link-dark">
                                <i class="bi bi-speedometer2"></i>
                                <span class="sidebar-item-text">Thống kê bán hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark
                                ">
                                <i class="bi bi-receipt-cutoff me-3"></i>
                                <span class="sidebar-item-text">Quản lý đơn hàng</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link link-dark tour-btn ms-2" type="button">
                                <img src="<?php echo SITEURL ?>seller/assets/img/product-icon.png" alt="" style="width: 30px;">
                                <span class="sidebar-item-text ms-3 text-muted">Quản lý sản phẩm</span>
                                <span class="fas fa-caret-down tour-caret"></span>
                            </a>
                            <ul class="tour-show">
                                <li><a href="<?php echo SITEURL ?>seller/products/index.php" class="">Tất cả sản phẩm</a></li>
                                <li><a href="<?php echo SITEURL ?>seller/products/add-product.php" class="">Thêm sản phẩm</a></li>
                                <li><a href="<?php echo SITEURL ?>seller/products/delete-product.php" class="">Xóa sản phẩm</a></li>
                                <li><a href="#" class="">Quản lý tồn kho</a></li>
                                <li><a href="#" class="">Sản phẩm bị khóa</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <i class="bi bi-wallet"></i>
                                <span class="sidebar-item-text">Tài chính</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <i class="bi bi-person"></i>
                                <span class="sidebar-item-text">Hồ sơ</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <i class="bi bi-question-square"></i>
                                <span class="sidebar-item-text">Hỗ trợ</span>
                            </a>
                        </li>
                        <hr style="width: 100%;">
                        <li>
                            <a href="<?php echo SITEURL ?>seller/partials/log-out.php" class="nav-link link-dark">
                                <i class="bi bi-box-arrow-right"></i>
                                <span class="sidebar-item-text">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Sidebar end -->

            <!-- Content start-->
            <div class="col main-right container-fluid row ">
