<?php
require './config/constants.php';
require './header.php';

$sql = "SELECT * FROM products
  order by productID desc";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    $error = 'Không có sản phẩm nào';
}
?>

<main style="background-color: aqua;">
    <section class="posts_slider container-fluid" style="padding: 0;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/slider3.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/slider5.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/slider4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <i class="bi bi-arrow-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <i class="bi bi-arrow-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <div class="simple-banner mt-2">
        <a href="">
            <img src="assets/img/flash-sale.png" alt="">
        </a>
    </div>
    <!-- product -->

    <div id="intro mt-4 ms-5 me-5">
        <div class="title-product col-md-2 mt-5 ms-5 p-2" style="background-color: aqua;">
            <h3>Cá, tép, ốc cảnh</h3>
        </div>
        <!--  -->
        <?php
        $sql_fish = "SELECT * FROM products WHERE category='Cá, tép, ốc cảnh' order by productID desc";
        $result_fish = mysqli_query($conn, $sql_fish);
        ?>
        <!--  -->
        <ul class="products ms-5 me-5 d-flex justify-content-start">
            <?php foreach ($result_fish as $each) { ?>
                <li>
                    <div class="product-item list-group" style="height: 400px;">
                        <div class="product-top">
                            <a href="detailView.php?id=<?= $each['productID'] ?>">
                                <img src="assets/img/products/<?= explode(",", $each['image'])[0]; ?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-cat"><?= $each['productName'] ?></p>
                            <p class="product-status" style="color: red; font-size: 15px;">Đã bán: <?= $each['sold'] ?></p>
                            <div class="product-price-action">
                                <p class="product-price"><?= number_format($each['price'], 0, '.', '.') ?>đ</p>
                                <div class="product-action">
                                    <?php
                                    if ($each['userID'] == $_SESSION['id']) {
                                    ?>
                                        <p class="sold-out">Sản phẩm của bạn</p>
                                    <?php
                                    } else if ($each['stock'] == 0) {
                                    ?>
                                        <p class="sold-out">Hết hàng</p>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="button" class="btn-add-to-cart" data-product_id="<?php echo $each['productID']; ?>"><i class="bi bi-cart-plus-fill"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>

        <div class="title-product col-md-2 mt-5 ms-5 p-2" style="background-color: aqua;">
            <h3 style="color: darkmagenta;">Cây thủy sinh</h3>
        </div>
        <!--  -->
        <?php
        $sql_tree = "SELECT * FROM products WHERE category='Cây thủy sinh' order by productID desc";
        $result_tree = mysqli_query($conn, $sql_tree);
        ?>
        <!--  -->
        <ul class="products ms-5 me-5 d-flex justify-content-start">
            <?php foreach ($result_tree as $each) { ?>
                <li>
                    <div class="product-item list-group" style="height: 400px;">
                        <div class="product-top">
                            <a href="detailView.php?id=<?= $each['productID'] ?>">
                                <img src="assets/img/products/<?= explode(",", $each['image'])[0]; ?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-cat"><?= $each['productName'] ?></p>
                            <p class="product-status" style="color: red; font-size: 15px;">Đã bán: <?= $each['sold'] ?></p>
                            <div class="product-price-action">
                                <p class="product-price"><?= number_format($each['price'], 0, '.', '.') ?>đ</p>
                                <div class="product-action">
                                    <?php
                                    if ($each['userID'] == $_SESSION['id']) {
                                    ?>
                                        <p class="sold-out">Sản phẩm của bạn</p>
                                    <?php
                                    } else if ($each['stock'] == 0) {
                                    ?>
                                        <p class="sold-out">Hết hàng</p>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="button" class="btn-add-to-cart" data-product_id="<?php echo $each['productID']; ?>"><i class="bi bi-cart-plus-fill"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>

        <div class="title-product col-md-2 mt-5 ms-5 p-2" style="background-color: aqua;">
            <h3 style="color: darkmagenta;">Bể cá</h3>
        </div>
        <!--  -->
        <?php
        $sql_aquarium = "SELECT * FROM products WHERE category='Bể cá' order by productID desc";
        $result_aquarium = mysqli_query($conn, $sql_aquarium);
        ?>
        <!--  -->
        <ul class="products ms-5 me-5 d-flex justify-content-start">
            <?php foreach ($result_aquarium as $each) { ?>
                <li>
                    <div class="product-item list-group" style="height: 400px;">
                        <div class="product-top">
                            <a href="detailView.php?id=<?= $each['productID'] ?>">
                                <img src="assets/img/products/<?= explode(",", $each['image'])[0]; ?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-cat"><?= $each['productName'] ?></p>
                            <p class="product-status" style="color: red; font-size: 15px;">Đã bán: <?= $each['sold'] ?></p>
                            <div class="product-price-action">
                                <p class="product-price"><?= number_format($each['price'], 0, '.', '.') ?>đ</p>
                                <div class="product-action">
                                    <?php
                                    if ($each['userID'] == $_SESSION['id']) {
                                    ?>
                                        <p class="sold-out">Sản phẩm của bạn</p>
                                    <?php
                                    } else if ($each['stock'] == 0) {
                                    ?>
                                        <p class="sold-out">Hết hàng</p>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="button" class="btn-add-to-cart" data-product_id="<?php echo $each['productID']; ?>"><i class="bi bi-cart-plus-fill"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <!--  -->
        <div class="title-product col-md-2 mt-5 ms-5 p-2" style="background-color: aqua;">
            <h3 style="color: darkmagenta;">Thức ăn</h3>
        </div>
        <!--  -->
        <?php
        $sql_food = "SELECT * FROM products WHERE category='Thức ăn' order by productID desc";
        $result_food = mysqli_query($conn, $sql_food);
        ?>
        <!--  -->
        <ul class="products ms-5 me-5 d-flex justify-content-start">
            <?php foreach ($result_food as $each) { ?>
                <li>
                    <div class="product-item list-group" style="height: 400px;">
                        <div class="product-top">
                            <a href="detailView.php?id=<?= $each['productID'] ?>">
                                <img src="assets/img/products/<?= explode(",", $each['image'])[0]; ?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-cat"><?= $each['productName'] ?></p>
                            <p class="product-status" style="color: red; font-size: 15px;">Đã bán: <?= $each['sold'] ?></p>
                            <div class="product-price-action">
                                <p class="product-price"><?= number_format($each['price'], 0, '.', '.') ?>đ</p>
                                <div class="product-action">
                                    <?php
                                    if ($each['userID'] == $_SESSION['id']) {
                                    ?>
                                        <p class="sold-out">Sản phẩm của bạn</p>
                                    <?php
                                    } else if ($each['stock'] == 0) {
                                    ?>
                                        <p class="sold-out">Hết hàng</p>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="button" class="btn-add-to-cart" data-product_id="<?php echo $each['productID']; ?>"><i class="bi bi-cart-plus-fill"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <!--  -->
        <div class="title-product col-md-2 mt-5 ms-5 p-2" style="background-color: aqua;">
            <h3 style="color: darkmagenta;">Phụ kiện thủy sinh</h3>
        </div>
        <!--  -->
        <?php
        $sql_accessory = "SELECT * FROM products WHERE category='Phụ kiện hồ cá' or category='Phụ kiện thủy sinh' order by productID desc";
        $result_accessory = mysqli_query($conn, $sql_accessory);
        ?>
        <!--  -->
        <ul class="products ms-5 me-5 d-flex justify-content-start">
            <?php foreach ($result_accessory as $each) { ?>
                <li>
                    <div class="product-item list-group" style="height: 400px;">
                        <div class="product-top">
                            <a href="detailView.php?id=<?= $each['productID'] ?>">
                                <img src="assets/img/products/<?= explode(",", $each['image'])[0]; ?>" alt="">
                            </a>
                        </div>
                        <div class="product-info">
                            <p class="product-cat"><?= $each['productName'] ?></p>
                            <p class="product-status" style="color: red; font-size: 15px;">Đã bán: <?= $each['sold'] ?></p>
                            <div class="product-price-action">
                                <p class="product-price"><?= number_format($each['price'], 0, '.', '.') ?>đ</p>
                                <div class="product-action">
                                    <?php
                                    if ($each['userID'] == $_SESSION['id']) {
                                    ?>
                                        <p class="sold-out">Sản phẩm của bạn</p>
                                    <?php
                                    } else if ($each['stock'] == 0) {
                                    ?>
                                        <p class="sold-out">Hết hàng</p>
                                    <?php
                                    } else {
                                    ?>
                                        <button type="button" class="btn-add-to-cart" data-product_id="<?php echo $each['productID']; ?>"><i class="bi bi-cart-plus-fill"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <!--  -->
    </div>

    <div class="product-more" style="text-align: center;">
        <a href=""><button class="view-more bg-white">Xem Thêm</button></a>
    </div>
    <div class="notice bg-light">
        <div class="title-notice mt-5">
            <h1>Tin tức nổi bật nhất</h1>
        </div>
        <section class="posts_slider container mt-3">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="assets/img/fish8.jpg" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Mua cá rồng và những điều cần biết</h4>
                                        <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng cần lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="assets/img/becacanh.jpg" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Thi công Bể thủy sinh cần quan tâm những vấn đề gì?</h4>
                                        <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu? Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="assets/img/product1.jpg" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Mua cá rồng và những điều cần biết</h4>
                                        <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng cần lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="assets/img/becacanh.jpg" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                                        <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu? Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="assets/img/fish5.jpg" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Mua cá rồng và những điều cần biết</h4>
                                        <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng cần lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="assets/img/becacanh.jpg" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                                        <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu? Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <i class="bi bi-arrow-right"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

    </div>
</main>

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
