<?php
include "../../config/constants.php";

include "../partials/header.php";

$tableType = (isset($_GET['productstype']) ? $_GET['productstype'] : "all");

echo "<script  type = 'text/javascript'>showProductsData('table-products', '$tableType', 1, 20, 'productID asc'); </script>";

?>

<!-- Content start-->

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
    <h5 class="text-muted"><a href="../index.php">Kênh người bán</a> / </span><a href="">Quản lý sản phẩm</a></h5>
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
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "all" ? "active" : "") ?>">Tất cả</a>
            </li>
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "active" ? "active" : "") ?>">Đang hoạt động</a>
            </li>
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "run_out" ? "active" : "") ?>">Hết hàng</a>
            </li>
            <li class="nav-item">
                <a type="button" class="nav-mng-product nav-link <?php echo ($tableType == "locked" ? "active" : "") ?>">Bị khóa</a>
            </li>
        </ul>
        <hr class="mt-0">
    </div>

    <div class="col-md-12 products-search">
        <form>
            <div class="input-group mb-3">
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <select class="form-select select-ten">
                            <option value="0" selected>Tên sản phẩm</option>
                            <option value="1">Mã sản phẩm</option>
                        </select>
                        <input id="productNameSearch" type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3">Danh mục sản phẩm</span>
                        <input type="text" class="form-control" placeholder="Chọn danh mục sản phẩm">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3" dir="rtl" style="min-width: 161px;">Kho hàng</span>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                        <p class="text-muted px-2">__</p>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3" dir="rtl" style="min-width: 161px;">Đã bán</span>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                        <p class="text-muted px-2">__</p>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
            </div>

            <button class="btn btn-danger px-4">Tìm</button>
            <button class="btn btn-secondary px-4">Nhập lại</button>
        </form>
    </div>

    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-between">
            <?php
            //Sql Query 
            $sql_products = "SELECT * FROM products WHERE userID = '{$_SESSION['userID']}'";
            //Execute Query
            $res_products = $conn->query($sql_products);
            //Count Rows
            $count_products = $res_products->num_rows;
            ?>
            <h3 class="ms-2" id="label-count-prod"><?php echo $count_products ?> Sản phẩm </h3>
            <div class="box-button">
                <a type="button" href="./delete-product.php" class="btn ms-auto text-white" style="background-color:red"><i class="bi bi-plus-circle-fill me-1"></i> Xóa Sản Phẩm</a>
                <a type="button" href="./add-product.php" class="btn btn-info ms-auto text-white"><i class="bi bi-plus-circle-fill me-1"></i> Thêm 1 sản phẩm mới</a>
            </div>
        </div>
        <!--  -->
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã SKU</th>
                    <th>Danh mục hàng</th>
                    <th>Giá</th>
                    <th>Kho hàng</th>
                    <th>Đã bán</th>
                    <th>Sửa thông tin</th>
                </tr>
            </thead>
            <tbody id="table-products">
                <!--  -->

                <!--  -->
            </tbody>
        </table>
        <!--  -->
    </div>

</div>
<!-- Content end-->

<?php
echo "<script  type = 'text/javascript'>showProductsData('table-products', '$tableType', 1, 20, 'productID asc'); </script>";
include "../partials/footer.php";
?>