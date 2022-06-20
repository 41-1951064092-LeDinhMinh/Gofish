<?php
include "../../config/constants.php";

include "../partials/header.php";

?>

<!-- Content start-->

<div class="col-md-12 mt-2 mb-3 nav-page">
    <h5 class="text-muted"><a href="">Kênh người bán</a> / <a href="">Quản lý sản phẩm</a> / <b href="">Xóa sản phẩm</b></h5>
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
if (!isset($_SESSION['editProdSucsess']) && !isset($_SESSION['addProdSucsess']) && !isset($_SESSION['upProdStockSucsess']) && !isset($_SESSION['deleteProdSucsess']) && !isset($_SESSION['deleteAllProdSucsess'])) {
    echo "d-none";
}
?>
 " id="alert-success-pr" role="alert">
    <i class="bi bi-check-circle-fill me-2" width="24" height="24"></i>
    <div>
        <p class="d-inline">
            <?php
            if (isset($_SESSION['deleteProdSucsess'])) {
                echo $_SESSION['deleteProdSucsess'];
                unset($_SESSION['deleteProdSucsess']);
            }
            if (isset($_SESSION['deleteAllProdSucsess'])) {
                echo $_SESSION['deleteAllProdSucsess'];
                unset($_SESSION['deleteAllProdSucsess']);
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
    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-between">
            <?php
            //Sql Query 
            $sql_products = "SELECT * FROM products WHERE userID = '{$_SESSION['userID']}'";
            //Execute Query
            $result = $conn->query($sql_products);
            
            //Count Rows
            $count_products = $result->num_rows;


            ?>
            <h3 class="ms-2" id="label-count-prod"><?php echo $count_products ?> Sản phẩm </h3>
        </div>
        <!--  -->
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Danh mục hàng</th>
                    <th>Giá</th>
                    <th>Kho hàng</th>
                    <th>Đã bán</th>
                    <th>Xóa sản phẩm</th>
                </tr>
            </thead>
            <tbody id="table-products">
                <!--  -->
                <?php
                if($count_products > 0) {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="row">
                                <div style="max-width: fit-content;">
                                    <img src="../../assets/img/products/<?php echo explode(",", $row['image'])[0]; ?>" alt="" class="product-avatar-list">
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
                            </td>
                            <td><?= $row['productID']; ?></td>
                            <td><?= $row['category']; ?></td>
                            <td><?= $row['price']; ?>đ</td>
                            <td class="text-center"><?= $row['stock']; ?>
                            </td>
                            <td class="text-center"><?= $row['sold']; ?></td>
                            <td class="text-center">
                                <a onclick="return confirm('Bạn chắc chắn muốn xóa <?php echo $row['productName']; ?> ?')" href="./process-delete-product.php?productid=<?php echo $row['productID']; ?>" class="bi bi-trash fs-5"></a>
                            </td>
                        </tr>
                    <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan="7">
                            <div class="mt-5 mb-5 col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-search text-muted" style="font-size: 40px;"></i>
                                <p class="text-muted fs-5">Tài khoản hiện chưa đăng sản phẩm nào</p>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                <!--  -->
            </tbody>
        </table>
        <!--  -->
    </div>

</div>

<div class="col-12 mt-3 flex-row-reverse d-flex">
    <div class="box-button">
        <a type="button" href="./index.php" class="btn btn-secondary ms-auto text-white">Đóng</a>
        <?php
        if($count_products>0){
            ?>
            <a onclick="return confirm('Bạn chắc chắn muốn xóa toàn bộ sản phẩm đăng bán?')" type="button" href="./process-deleteAll-product.php" class="btn ms-auto text-white" style="background-color:red"><i class="bi bi-plus-circle-fill me-1"></i> Xóa hết</a>
        <?php
        }
        ?>
    </div>
</div>
<!-- Content end-->

<?php
include "../partials/footer.php";
?>