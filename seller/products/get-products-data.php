<?php
include "../../config/constants.php";

if (isset($_POST['tableID'])) {
    $tableType = $_POST['type'];
    $page = $_POST['page'];
    $numRow = $_POST['numRow'];
    $sortBy = $_POST['sortBy'];
    $productStatus = "";

    if ($tableType == "all") {
        $productStatus = "";
    } else if ($tableType == "active") {
        $productStatus = "status=1 and stock>0 and";
    } else if ($tableType == "run_out") {
        $productStatus = "stock=0 and";
    } else if ($tableType == "locked") {
        $productStatus = "status=3 and";
    }


    $sqlTotalRow    = "SELECT * FROM products WHERE $productStatus userID = '{$_SESSION['userID']}'";
    $totalRow       = $conn->query($sqlTotalRow)->num_rows;
    $numPage        = ceil($totalRow / $numRow);
    $start          = ($page - 1) * $numRow;
    $sql            = $sqlTotalRow . " ORDER BY $sortBy" . " LIMIT $start, $numRow";
    $result         = $conn->query($sql);


    if ($totalRow > 0) {
?>
        <?php
        $i = $start;
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
                <td><?= $row['productSKU']; ?></td>
                <td><?= $row['category']; ?></td>
                <td><?= $row['price']; ?>đ</td>
                <td class="text-center"><?= $row['stock']; ?>
                    <?php
                    if ($row['status'] == 3) {
                    ?>
                        <i class="bi bi-pencil-fill fs-6 text-muted" style="cursor:not-allowed;"></i>

                    <?php
                    } else {
                    ?>
                        <i class="bi bi-pencil-fill text-danger fs-6 btn-update-stock" type="button" data-productid="<?php echo $row['productID']; ?>" data-productstock="<?php echo $row['stock']; ?>" data-productsku="<?php echo $row['productSKU']; ?>"></i>
                    <?php
                    }
                    ?>
                </td>
                <td class="text-center"><?= $row['sold']; ?></td>
                <td class="text-center">
                    <?php
                    if ($row['status'] == 3) {
                    ?>
                        <i class="bi bi-pencil-square fs-5 text-muted" style="cursor:not-allowed;"></i>

                    <?php
                    } else {
                    ?>
                        <a href="./edit-product.php?productid=<?php echo $row['productID']; ?>&productsku=<?php echo $row['productSKU']; ?>" class="bi bi-pencil-square fs-5"></a>
                    <?php
                    }
                    ?>

                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="7">
                <div class="mt-5 mb-5 col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-search text-muted" style="font-size: 40px;"></i>
                    <p class="text-muted fs-5">Không tìm thấy dữ liệu</p>
                </div>
            </td>
        </tr>


<?php
    }
    //



    //
}
else {
    header("location:" . SITEURL . "seller/");
}


?>