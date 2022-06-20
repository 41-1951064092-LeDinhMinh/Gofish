<?php
include "../../config/constants.php";

// Update stock
if(isset($_POST['productID']) && isset($_POST['stock'])){
    $productID = $_POST['productID'];
    $stock     = $_POST['stock'];
    // $productSKU = $_POST['productSKU'];
    try{
        $sqlUpdateStock = "UPDATE products SET stock=$stock WHERE productID='$productID'";
        if($conn->query($sqlUpdateStock)){
            echo "success";
        }
        else{
            echo "false";
        }
    }
    catch(Exception){
        echo "false";
    }
}
else {
    header("location:" . SITEURL . "seller/");
}



?>