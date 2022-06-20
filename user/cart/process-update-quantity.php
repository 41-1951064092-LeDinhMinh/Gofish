<?php
require '../../config/constants.php';


if (isset($_POST['productID']) && isset($_POST['quantity'])) {
    $productID = $_POST['productID'];
    $quantity  = $_POST['quantity'];
    $userID    = $_SESSION['id'];

    // Update quantity
    $sql_update_quantity= "UPDATE cart SET quantity='$quantity',time_add=current_timestamp() WHERE userID='$userID' AND productID='$productID';";
    $num = $conn->query($sql_update_quantity);
}