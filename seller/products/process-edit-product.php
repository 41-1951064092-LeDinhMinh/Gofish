<?php
include "../../config/constants.php";

if (isset($_POST['btnEditProduct'])) {
    $prodID         = $_POST['productID'];
    $prodName       = $_POST['prodNameEdit'];
    $prodDetail     = $_POST['prodDetailEdit'];
    $prodCategory   = $_POST['prodCategoryEdit'];
    $prodSKU        = $_POST['prodSKUEdit'];
    $prodPrice      = $_POST['prodPriceEdit'];
    $prodStock      = $_POST['prodStockEdit'];
    $userIDPr       = $_SESSION['userID'];
    $prodImg        = "";
    // $statusMsgUploadImg = "";


    // Get status of image in database is exist or not
    $ispt1empty =  $_POST['isphoto1editempty'];
    $ispt2empty =  $_POST['isphoto2editempty'];
    $ispt3empty =  $_POST['isphoto3editempty'];
    $img1Status = "no";
    $img2Status = "no";
    $img3Status = "no";


    if($prodSKU == ""){$prodSKU = "NULL";}
    // Gen random character to set name for prducts image
    $temp_word = array_merge(range('a', 'z'));
    shuffle($temp_word);
    $randChr = substr(implode($temp_word), 0, 20) . rand(000, 999);


    // Process upload products image
    // Image 1
    if (empty($_FILES["prodImg1Edit"]["name"])  && $ispt1empty != "TRUE") {
        $prodImg =  $ispt1empty;
        $img1Status = "yes";
    } else if (isset($_FILES['prodImg1Edit']) && !empty($_FILES["prodImg1Edit"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg1Edit"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage1 = $randChr . "-1." . $fileType;
        $targetFilePath = $targetDir . $prodImage1;
        $allowTypes = array('jpg', 'png', 'jpeg');
        //
        if ($ispt1empty != "TRUE") {
            unlink("../../assets/img/products/" . $ispt1empty);
        }
        //
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg1Edit"]["tmp_name"], $targetFilePath)) {
                $prodImg = $prodImg . $prodImage1;
                $img1Status = "yes";
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    } else {
        $prodImg =  "";
        $img1Status = "no";
    }


    // Image 2
    if (empty($_FILES["prodImg2Edit"]["name"])  && $ispt2empty != "TRUE") {
        if ($img1Status == "yes") {
            $prodImg = $prodImg . "," . $ispt2empty;
        } else if ($img1Status == "no") {
            $prodImg = $prodImg . $randChr . "-1." . explode(".", $ispt2empty)[1];
        }
        $img2Status = "yes";
    } else if (isset($_FILES['prodImg2Edit']) && !empty($_FILES["prodImg2Edit"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg2Edit"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage2 = "";
        $prodImage2_temp = "";
        if ($img1Status == "no") {
            $prodImage2 = $randChr . "-1." . $fileType;
            $prodImage2_temp = $randChr . "-1." . $fileType;
        } else {
            $prodImage2 = "," . $randChr . "-2." . $fileType;
            $prodImage2_temp = $randChr . "-2." . $fileType;
        }
        $targetFilePath = $targetDir . $prodImage2_temp;
        $allowTypes = array('jpg', 'png', 'jpeg');
        //
        if ($ispt2empty != "TRUE") {
            unlink("../../assets/img/products/" . $ispt2empty);
        }
        //
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg2Edit"]["tmp_name"], $targetFilePath)) {
                $prodImg = $prodImg . $prodImage2;
                $img2Status = "yes";
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }





    // Image 3
    if (empty($_FILES["prodImg3Edit"]["name"])  && $ispt3empty != "TRUE") {
        if ($img2Status == "yes") {
            if ($img1Status == "yes") {
                $prodImg = $prodImg . "," . $ispt3empty;
            } else if ($img1Status == "no") {
                $prodImg = $prodImg . "," . $randChr . "-2." . explode(".", $ispt3empty)[1];
            }
        } else if ($img2Status == "no") {
            if ($img1Status == "yes") {
                $prodImg = $prodImg . "," . $randChr . "-2." . explode(".", $ispt3empty)[1];
            } else if ($img1Status == "no") {
                $prodImg = $prodImg . $randChr . "-1." . explode(".", $ispt3empty)[1];
            }
        }
        $img3Status = "yes";
    }

    if (isset($_FILES['prodImg3Edit']) && !empty($_FILES["prodImg3Edit"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg3Edit"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage3 = "";
        $prodImage3_temp = "";
        //
        if ($img2Status == "yes") {
            if ($img1Status == "yes") {
                $prodImage3 = "," . $randChr . "-3." . $fileType;
                $prodImage3_temp = $randChr . "-3." . $fileType;
            } else if ($img1Status == "no") {
                $prodImage3 = "," . $randChr . "-2." . $fileType;
                $prodImage3_temp = $randChr . "-2." . $fileType;
            }
        } else if ($img2Status == "no") {
            if ($img1Status == "yes") {
                $prodImage3 = "," . $randChr . "-2." . $fileType;
                $prodImage3_temp = $randChr . "-2." . $fileType;
            } else if ($img1Status == "no") {
                $prodImage3 = $randChr . "-1." . $fileType;
                $prodImage3_temp = $randChr . "-1." . $fileType;
            }
        }
        //
        $targetFilePath = $targetDir . $prodImage3_temp;
        $allowTypes = array('jpg', 'png', 'jpeg');
        //
        if ($ispt3empty != "TRUE") {
            unlink("../../assets/img/products/" . $ispt3empty);
        }
        //
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg3Edit"]["tmp_name"], $targetFilePath)) {
                $prodImg = $prodImg . $prodImage3;
                $img3Status = "yes";
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }




    $sql_edit_product = "UPDATE products SET productSKU='$prodSKU', productName='$prodName', category='$prodCategory', detail='$prodDetail', price='$prodPrice', stock='$prodStock', image='$prodImg' WHERE productID='$prodID' AND userID='$userIDPr';";
    $edit_product = $conn->query($sql_edit_product);

    $_SESSION['editProdSucsess'] = "Đã <strong>cập nhật</strong> thông tin sản phẩm <strong> SKU: ".$prodSKU."</strong> Thành công!";
    header("location:" . SITEURL . "seller/products/");

} else {
    header("location:" . SITEURL . "seller/");
}
