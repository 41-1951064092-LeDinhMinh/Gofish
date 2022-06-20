<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo SITEURL ?>assets/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo SITEURL ?>assets/js/scripts.js"></script>
</head>

<body>
    <!-- Modal add to cart success -->
    <div class="modal fade modal-add-to-cart-success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div>
                <img src="./assets/img/tick-icon.png" alt="img" class="mt-5">
                <p class="mt-4 fs-5">Sản phẩm đã được thêm vào giỏ hàng</p>
            </div>
        </div>
    </div>
    <!--  -->
    <header class="fixed-top">
        <div class="header-top container-fluid">
            <div class="wrapper ms-5 me-3">
                <div class="initial ms-5 pe-2">
                    <a href="<?php echo SITEURL ?>seller/">Kênh người bán</a>
                </div>
                <div class="initial ms-2 pe-2">
                    <a href="">Tải ứng dụng</a>
                </div>
                <div class="social ms-2 pe-2">
                    <span style="color: rgb(150, 157, 21);">Kết nối</span>
                    <a href=""><i class="bi bi-facebook text-primary"></i></a>
                    <a href=""><i class="bi bi-tiktok text-dark"></i></a>
                    <a href=""><i class="bi bi-instagram text-info me-5"></i></a>
                </div>
                <div class="slogan ms-auto">
                    <p class="me-5">Gofish - Thả hồn vào sự huyền dịu của thiên nhiên</p>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-logo ms-5" href="<?php echo SITEURL ?>index.php">
                    <button type="button" class="btn btn-light ms-2">
                        <img src="<?php echo SITEURL ?>assets/img/gofish-logo.png" alt="">
                    </button>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #000;"></span>
                </button>
                <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
                    <div class="search ms-5" style="display: inline;">
                        <div style="display: inline-flex;">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control p-3" placeholder="Search for fish, product...">
                        </div>
                    </div>
                    <li class="nav-item dropdown ms-5 ms-5 text-danger fs-5" style="border-right: 1px solid rgb(238, 221, 221);font-weight: 600; line-height: 30px;">
                        <a class="nav-link me-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text-nav">
                                <i class="bi bi-person-circle text-danger"></i> <span class="text-danger">Tài khoản</span>
                                <i class="bi bi-caret-down-fill text-danger"></i>
                            </div>
                            </i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 150px; text-align: center;">
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?>
                                <div class="logout" style="border-bottom: 1px solid pink   ;">
                                    <a href="<?php echo SITEURL ?>logout.php" class="text-danger">Đăng xuất</a>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="login" style="border-bottom: 1px solid pink   ;">
                                    <a href="<?php echo SITEURL ?>login.php" class="text-danger">Đăng nhập</a>
                                </div>
                                <div class="signup">
                                    <a href="<?php echo SITEURL ?>signup.php" class="text-danger">Đăng Ký</a>
                                </div>
                            <?php
                            }
                            ?>

                        </ul>
                    </li>
                    <a href="#" class="notifi ms-5 text-danger fs-5" style="font-weight: 600; line-height: 30px;position:relative;">
                        <i class="bi bi-bell fs-4"></i><span class="fs-5">Thông báo</span>
                    </a>
                    <!-- Quick view cart start -->
                    <div class="cart ms-5 text-danger fs-5 quick-cart mt-3" style="font-weight: 600; line-height: 30px;position:relative;">
                        
                    </div>
                    <!-- Quick view cart end -->

                </div>
            </div>
        </div>

        <div class="menu">
            <div class="wrapper container ms-5 me-5">
                <ul class="main-nav ms-5">
                    <li class="nav-item ms-5">
                        <a class="nav-link active" href="">
                            <div class="text-nav" style="font-style: normal; font-size: 18px;">Trang chủ</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <div class="text-nav" style="font-style: normal; font-size: 18px;">Sản phẩm</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <div class="text-nav" style="font-style: normal; font-size: 18px;">Giới thiệu</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <div class="text-nav" style="font-style: normal; font-size: 18px;">
                                <i class="bi bi-info-circle"></i> Hỗ trợ
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <div class="text-nav" style="font-style: normal; font-size: 18px;">Tin tức</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <div class="text-nav" style="font-style: normal; font-size: 18px;">Liên hệ</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </header>

    <!-- Main start -->