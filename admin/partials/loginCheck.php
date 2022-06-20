<?php

if (!isset($_SESSION['adminID'])) {
    header("location: ./login.php");
}
?>
