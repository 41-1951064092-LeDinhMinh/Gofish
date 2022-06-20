<?php
// include constants and header
require './config/constants.php';
require './header.php';

?>



<?php
/*Kiểm tra xem có nhận được mã sản phẩm từ trang chủ*/
if (isset($_GET['id'])) {
  //Lấy mã sản phẩm và thông tin của sản phẩm đã chọn
  $iditem = $_GET['id'];
  //sql lấy thông tin của sản phẩm
  $sql = "SELECT users.id,users.username,users.email,users.phone,users.address,products.productName,products.productSKU,products.category,products.price,products.detail,products.stock,products.image
        FROM products,users where products.userid = users.id and products.productID  = '$iditem' and products.status = '1'";

  //Thực thi câu lệnh
  $res = mysqli_query($conn, $sql);

  //Đếm số bản ghi
  $count = mysqli_num_rows($res);
  //Kiểm tra xem bản ghi có tồn tại không
  if ($count == 1) {
    //Lấy dữ liệu từ database
    $row = mysqli_fetch_assoc($res);
    $tenSanPham = $row['productName'];
    $sku = $row['productSKU'];
    $theLoai = $row['category'];
    $price = $row['price'];
    $chiTiet = $row['detail'];
    $conLai = $row['stock'];
    $hinhAnh = $row['image'];
    $hinhAnhString = explode(',', $hinhAnh);
    $hinhAnh1 = $hinhAnhString[0];
    $hinhAnh2 = $hinhAnhString[1];
    $userName = $row['username'];
    $userEmail = $row['email'];
    $userPhone = $row['phone'];
    $userID = $row['id'];
  } else {
    //Chuyển hướng về trang chủ
    header('location:' . SITEURL);
  }
} else {
  //Chuyển hướng về trang chủ
  header('location:' . SITEURL);
}
?>

<main style="background-color: aqua;">
  <section class="posts_slider container-fluid" style="padding: 0;">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-12">
              <img src="https://cakienghoanglam.com/thumb/1366x524/1/upload/hinhanh/549862.png" alt="">
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="row">
            <div class="col-md-12">
              <img src="https://cakienghoanglam.com/thumb/1366x524/1/upload/hinhanh/549862.png" alt="">
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="row">
            <div class="col-md-12">
              <img src="https://cakienghoanglam.com/thumb/1366x524/1/upload/hinhanh/549862.png" alt="">
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
      <img src="https://cf.shopee.vn/file/0ed0d80b26a4a8dc8f8652679f37604d" alt="">
    </a>
  </div>

  <!-- Thông tin của item đã chọn -->
  <section class="Item-info">
    <div class="container">
      <div class="row" style='padding-top: 70px'>
        <!-- Đặt sản phẩm -->
        <div class="row border p-3 border-success rounded info-item" style="background-color: #ddd">
          <div style='font-size:22px;font-weight:500;padding:10px;background-color:blue;color:#fff;border-radius:8px;width:220px;margin-left:12px'>
            Thông tin sản phẩm
          </div>
          <div class="row">
            <div class="item-menu-img col-md-5">
              <?php
              //Kiểm tra hình ảnh
              if ($hinhAnh == "") {
                //nếu không có
                echo "<div class='error'>Image not Available.</div>";
              } else {
                //nếu có
              ?>
                <img src="<?php echo SITEURL; ?>assets/img/products/<?php echo $hinhAnh1; ?>" alt="Item-img" style="max-height: 400px;width:100%" class="img-fluid mt-3">
                <img src="<?php echo SITEURL; ?>assets/img/products/<?php echo $hinhAnh2; ?>" alt="Item-img" style="max-height: 400px;width:100%" class="img-fluid mt-3">
              <?php
              }

              ?>

            </div>
            <div class="order col-md-7 mt-3">
              <!-- Chi tiết của sản phẩm và chọn thanh toán -->
              <div class="item-menu-desc">
                <h4 style='color:blue'>
                  <?php echo $tenSanPham; ?>
                </h4>
                <p>SKU: <span style='color:red;font-weight:500;font-size:25px'>
                    <?php echo $sku; ?>

                  </span>
                </p>
                <p>Giá: <span style='color:red;font-weight:500;font-size:25px' id='price'>
                    <?php echo $price; ?> đ

                  </span>
                </p>
                <p>Còn lại: <span style='color:red;font-weight:500;font-size:25px'>
                    <?php echo $conLai; ?>
                  </span>
                </p>
                <p class="text-success"><i class="bi bi-flag me-3"></i>Loại Hình:
                  <?php echo $theLoai ?>
                </p>
                <!-- <p><i class="bi bi-building me-3"></i>Mã người bán:
                    <?php //echo $userID 
                    ?>
                  </p> -->
                <p><i class="bi bi-building me-3"></i>Người bán:
                  <?php echo $userName ?>
                </p>
                <p><i class="bi bi-envelope me-3"></i>Email liên hệ:
                  <?php echo $userEmail ?>
                </p>
                <p><i class="bi bi-telephone me-3"></i>Số điện thoại liên hệ:
                  <?php echo $userPhone ?>
                </p>
                <p>
                  <span style='color:blue;font-weight:500;font-size:25px'>
                    Thông tin về sản phẩm: <br>
                  </span>
                  <?php echo $chiTiet; ?>
                </p>


                <div class="item-num d-flex mt-5 mb-2">
                  <h4 class="me-2">Số lượng</h4>
                  <ul class="pagination justify-content-end">
                    <li class="page-item page-item-btn-decrease">
                      <a class="page-link bi bi-dash-lg" id="btn-decrease" type="button"></a>
                    </li>
                    <li class="page-item">
                      <input type="text" id="input-quantity-detail" class="page-link px-2 text-dark" autocomplete="off" value="1" style="width: 50px;" data-prod_stock="<?php echo $conLai ?>">
                    </li>
                    <li class="page-item">
                      <a class="page-link bi-plus-lg" id="btn-increase" type="button"></a>
                    </li>
                  </ul>
                </div>
              </div>


              <div>
                <?php
                if ($userID == $_SESSION['id']) {
                ?>
                  <p class="sold-out-detail">Sản phẩm của bạn</p>
                <?php
                }
                else if ($conLai == 0) {
                ?>
                  <p class="sold-out-detail">Hết hàng</p>
                <?php
                } else {
                ?>
                  <button type="button" class="bi bi-cart-plus-fill btn-add-to-cart-detail" data-product_id="<?php echo $iditem ?>"><span class="ms-1">Thêm vào giỏ hàng</span>
                  </button>
                <?php
                }
                ?>

              </div>

            </div>
          </div>
        </div>

        <!-- Hết đặt sản phẩm -->
      </div>

    </div>
    </div>
  </section>
  <!-- Kết thúc phần thông tin sản phẩm -->

  <!-- Notice -->
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
                    <img src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Mua cá rồng và những điều cần biết</h4>
                    <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý
                      nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng
                      cần
                      lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img src="https://cakienghoanglam.com/upload/user/images/thi-cong-ho-thuy-sinh-1.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                    <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu?
                      Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông
                      tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
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
                    <img src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Mua cá rồng và những điều cần biết</h4>
                    <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý
                      nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng
                      cần
                      lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img src="https://cakienghoanglam.com/upload/user/images/thi-cong-ho-thuy-sinh-1.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                    <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu?
                      Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông
                      tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
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
                    <img src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Mua cá rồng và những điều cần biết</h4>
                    <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý
                      nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng
                      cần
                      lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                    <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu?
                      Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông
                      tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
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

<footer style="background-color: #faf9f7;" class="mt-3">
  <div class="container pt-3">
    <div class="row">
      <div class="col-md-4">
        <div class=" logo-footer">
          <img class="col-md-6 img-fluid" src="https://images.squarespace-cdn.com/content/v1/5cef069f124fff000125b347/1559169045380-V07V99DGIM6IQ01H0Z2U/gofish-logo.png" alt="">
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
          <li><a href="" class="text-decoration-none">Kênh Người Bán</a></li>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>