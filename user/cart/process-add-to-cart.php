<?php
require '../../config/constants.php';


if (isset($_POST['productID']) && isset($_POST['quantity'])) {
    $productID = $_POST['productID'];
    $quantity  = $_POST['quantity'];
    $userID    = $_SESSION['id'];

    // Check if product is exist or not in database
    $sql_check_exist = "SELECT * FROM cart WHERE userID='$userID' AND productID='$productID';";
    $num = $conn->query($sql_check_exist)->num_rows;
    // If exist, update quantity
    if ($num == 1) {
        $sql_update_cart = "UPDATE cart SET quantity=quantity + $quantity, time_add=current_timestamp() WHERE userID='$userID' AND productID='$productID';";
        $conn->query($sql_update_cart);
    } 
    else {// If not exist, insert new data
        $sql_insert_cart = "INSERT INTO cart VALUES('$userID', '$productID', '$quantity', current_timestamp());";
        $conn->query($sql_insert_cart);
    }
}
