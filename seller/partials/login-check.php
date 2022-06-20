<?php
if (!isset($_SESSION['id'])) {
    header("location:".SITEURL."login.php");
}
?>