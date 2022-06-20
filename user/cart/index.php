<?php
require '../../config/constants.php';
require '../../header.php';
?>

<!-- Modal remove product from cart -->
<div class="modal fade md-conf-remove-from-cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 380px;">
        <div class="modal-content">
            <div class="modal-body container-fluid">
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <i class="bi bi-exclamation-triangle me-2 text-warning fs-4"></i>
                        <h5 class="modal-title me-auto mt-1">Xóa sản phẩm</h5>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center px-5 mt-2">
                        <p id="conf-remove-from-cart-content"></p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="button" id="btn-conf-remove-cart" class="btn me-2" style="border: solid 2px #1687d8; color: #1687d8;font-weight:500">Xác nhận</button>
                        <button type="button" class="btn text-light" style="background-color: #1687d8;font-weight:500" data-bs-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="main-cart container-fluid px-5">
    <div class="row" id="cart-view">

    </div>
</div>




<!--  -->
<footer>
    <footer style="background-color: #faf9f7;" class="mt-3">
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class=" logo-footer">
                        <img class="col-md-6" src="assets/img/gofish-logo.png" alt="">
                    </div>
                </div>
                <div class="col-md mt-2">
                    <h1 class="text-footer">CHĂM SÓC KHÁCH HÀNG</h1>
                    <ul class="list-unstyled">
                        <li><a href="" class="text-decoration-none">Trung Tâm Trợ Giúp</a></li>
                        <li><a href="" class="text-decoration-none">Hướng Dẫn Mua Hàng</a></li>
                        <li><a href="" class="text-decoration-none">Hướng Dẫn Bán Hàng</a></li>
                        <li><a href="" class="text-decoration-none">Thanh Toán</a></li>
                        <li><a href="" class="text-decoration-none">Vận chuyển</a></li>
                        <li><a href="" class="text-decoration-none">Trả Hàng & Hoàn Tiền</a></li>
                        <li><a href="" class="text-decoration-none">Chính Sách Bảo Hành</a></li>
                    </ul>
                </div>
                <div class="col-md mt-2">
                    <h1 class="text-footer">About Gofish</h1>
                    <ul class="list-unstyled">
                        <li><a href="" class="text-decoration-none">Giới thiệu về Gofish</a></li>
                        <li><a href="" class="text-decoration-none">Tuyển dụng</a></li>
                        <li><a href="" class="text-decoration-none">Điều khoản</a></li>
                        <li><a href="" class="text-decoration-none">Chính sách bảo mật</a></li>
                        <li><a href="seller.php" class="text-decoration-none">Kênh Người Bán</a></li>
                        <li><a href="" class="text-decoration-none">Flash Sales</a></li>
                    </ul>
                </div>
                <div class="col-md mt-2">
                    <h1 class="text-footer">Theo dõi chúng tôi trên</h1>
                    <ul class="list-unstyled">
                        <li><a href=""><i class="bi bi-facebook text-primary"></i> Facebook</a></li>
                        <li><a href=""><i class="bi bi-tiktok text-dark"></i>Tiktok</a></li>
                        <li><a href=""><i class="bi bi-instagram text-info"></i>Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</footer>
<div class="mt-2" style="text-align: center;">
    <div class="col-md ms-5 me-5">
        <ul class="list-footer">
            <li>
                <p style="margin-top: 15px; display: inline-flex;">Gofish
                    <span style="color: rgb(119, 108, 108) ;" class="footer-text">© 2021 </span>
                </p>
            </li>
            <li><a href="" class="text-decoration-none link-dark">About</a></li>
            <li><a href="" class="text-decoration-none link-dark">Acessibility</a></li>
            <li><a href="" class="text-decoration-none link-dark">User Agreement</a></li>
            <li><a href="" class="text-decoration-none link-dark">Privacy Policy</a></li>
            <li><a href="" class="text-decoration-none link-dark">Cookie Policy</a></li>
            <li><a href="" class="text-decoration-none link-dark">Copyright Policy</a></li>
            <li><a href="" class="text-decoration-none link-dark">Brand Policy</a></li>
            <li><a href="" class="text-decoration-none link-dark">Guest Controls</a></li>
            <li><a href="" class="text-decoration-none link-dark">Community Guidelines</a></li>
            <li><a href="" class="text-decoration-none link-dark">Guest Controls</a></li>
            <li><a href="" class="text-decoration-none link-dark">Language</a></li>
        </ul>
    </div>
</div>
<div id="hotline">
    <a href="tel:0366035523" id="yBtn">
        <i class="bi bi-telephone-fill"></i>
    </a>
    <div class="text-quotes">
        <a href="tel:0333135698">0366035523</a>
    </div>

</div>
<div id="messenger" style="width:20px">
    <i class="bi bi-messenger"></i>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>