<?php

    include "./partials/loginCheck.php";
    include "../config/constants.php";
    if(isset($_POST['btnDel'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM products WHERE productID = '$id'";
    
        $res = mysqli_query($conn,$sql);
    
        if($res > 0){
            $_SESSION['success'] = 'Xóa sản phẩm thành công!';
            header("location: products.php"); 
            exit();
        }else{
            $_SESSION['error'] = 'Xóa sản phẩm thất bại!';
        }
    
        mysqli_close($conn);
    }

?>