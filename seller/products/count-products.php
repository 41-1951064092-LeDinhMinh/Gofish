<?php
include "../../config/constants.php";

if (isset($_POST['type'])) {
    $tableType = $_POST['type'];
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
    echo $totalRow;

}
else {
    header("location:" . SITEURL . "seller/");
}
?>
