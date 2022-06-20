<?php
include "../config/constants.php";
include "./partials/loginCheck.php";
?> 
<?php

//
$_SESSION['userID'] = $_SESSION['id'];

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
                        <a class="navbar-brand me-auto" href="admin.php">Trang Quản Trị</a>
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
                        <li>
                            <a href="products.php" class="nav-link link-dark
                                ">
                                <i class="bi bi-basket"></i>
                                <span class="sidebar-item-text">Quản lý sản phẩm</span>
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

<!-- Modal edit stock start -->
<!-- <div class="modal fade" id="modalUpdateStock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> -->
<div class="modal fade" id="modalUpdateStock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <i class="bi bi-pencil me-2 fs-4 text-danger"></i>
                <h5 class="modal-title me-auto" id="staticBackdropLabel">Cập nhật tình trạng kho hàng</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="ms-2 me-3 pt-2">Kho hàng</span>
                    <input id="stockUpdateInput" type="text" class="form-control" placeholder="0" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="stockUpdateConf">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit stock end -->

<div class="col-md-12 mt-2 mb-3 nav-page">
    <h5 class="text-muted"><a href="../index.php">Trang quản trị</a> / </span><a href="">Quản lý tài khoản</a></h5>
</div>
<!--  -->
<div class="alert alert-success alert-dismissible alert-update-success d-flex align-items-center d-none" role="alert">
    <i class="bi bi-check-circle-fill me-2" width="24" height="24"></i>
    <div>
        <p id="alert-success-content" class="d-inline"></p><strong id="alert-success-taget"></strong><span> thành công!</span>
    </div>
    <button type="button" class="btn-close" onclick="removeAlert()"></button>
    <script>
        function removeAlert() {
            $(".alert-update-success").addClass("d-none");
        }
    </script>
</div>
<!--  -->
<div class="alert alert-success alert-dismissible d-flex align-items-center 
<?php
if (!isset($_SESSION['editProdSucsess']) && !isset($_SESSION['addProdSucsess']) && !isset($_SESSION['upProdStockSucsess'])) {
    echo "d-none";
}
?>
 " id="alert-success-pr" role="alert">
    <i class="bi bi-check-circle-fill me-2" width="24" height="24"></i>
    <div>
        <p class="d-inline">
            <?php
            if (isset($_SESSION['addProdSucsess'])) {
                echo $_SESSION['addProdSucsess'];
                unset($_SESSION['addProdSucsess']);
            }
            if (isset($_SESSION['editProdSucsess'])) {
                echo $_SESSION['editProdSucsess'];
                unset($_SESSION['editProdSucsess']);
            }
            ?>
        </p>
    </div>
    <button type="button" class="btn-close" onclick="rmAlert()"></button>
    <script>
        function rmAlert() {
            $("#alert-success-pr").addClass("d-none");
        }
    </script>
</div>
<!--  -->
<div class="col-md-12 manage-products shadow">
    <div class="col-md-12">
        <ul class="nav">
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link active <?php echo ($tableType == "all" ? "active" : "") ?>">Tất cả</a>
            </li>
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "active" ? "active" : "") ?>">Đang hoạt động</a>
            </li>
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "locked" ? "active" : "") ?>">Bị khóa</a>
            </li>
        </ul>
        <hr class="mt-0">
    </div>

    <div class="col-md-12 products-search">
        <form>
            <div class="input-group col-md-12 mb-3">
                <div class=" col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <select class="form-select select-ten">
                            <option value="0" selected>Tên người dùng</option>
                            <option value="1">Mã người dùng</option>
                        </select>
                        <input id="productNameSearch" type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
                <div class="col-md-12 col-lg-3 pe-4">
                    <button class="btn btn-danger px-4">Tìm</button>
                    <button class="btn btn-secondary px-4">Nhập lại</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3">Email</span>
                        <input type="email" class="form-control" placeholder="Chọn danh mục sản phẩm">
                    </div>
                </div>
            
        </form>
    </div>

    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-between">
            <?php
            //Sql Query 
            $sql_users = "SELECT * FROM users";
            //Execute Query
            $res_users = $conn->query($sql_users);
            //Count Rows
            $count_users = $res_users->num_rows;
            ?>
            <h3 class="ms-2" id="label-count-prod"><?php echo $count_users ?> Tài khoản </h3>
            <a type="button"  href="processDeleteAllAcc.php" onclick="return confirm('Xóa tài khoản sẽ xóa hết sản phẩm và giỏ hàng của tài khoản! Bạn có chắc chắn muốn xóa? ')" class="btn btn-danger ms-auto">
                <i class="bi bi-trash-fill me-1"></i>Xóa tất cả các tài khoản
            </a>
        </div>
        <!--  -->
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Họ Tên</th>
                    <th>SDT</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Tên tài khoản</th>
                    <th>Xóa tài khoản</th>
                </tr>
            </thead>
            <tbody id="table-products">
                <!--  -->
                <?php
                $sql = "Select id, fullname, phone, address, email, username from users";
                        $result = mysqli_query($conn,$sql);
                        //Bước 03: Xử lý kết quả truy vấn
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                                <tr>
                                    <th scope="row"><?php echo $row['fullname']; ?></th>
                                    <th><?php echo $row['phone']; ?></th>
                                    <th><?php echo $row['address']; ?></th>
                                    <th><?php echo $row['email']; ?></th>
                                    <th><?php echo $row['username']; ?></th>
                                    <th>
                                    <a onclick="return confirm('Xóa tài khoản sẽ xóa hết sản phẩm và giỏ hàng của tài khoản! Bạn có chắc chắn muốn xóa? ')" type="button"  class="btn ms-auto text-warning" 
                                        href="processDeleteAcc.php?id=<?php echo $row['id']; ?>">
                                        <i class="bi bi-trash"></i> 
                                    </a>
                                    </th>
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
