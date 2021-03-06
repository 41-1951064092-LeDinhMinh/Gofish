<?php
include "../config/constants.php";

include "./partials/loginCheck.php";

$prdid = $_GET['id'];
$prdsql="SELECT users.id,users.username,users.email,users.phone,users.address,products.productName,products.category,products.price,products.detail,products.stock,products.image FROM products,users where products.userid = users.id and products.productID  = '$prdid'";
$resultsql = mysqli_query($conn,$prdsql);
$countrs = mysqli_num_rows($resultsql);
if($countrs == 1){
    $row=mysqli_fetch_assoc($resultsql);
    $prdname = $row['productName'];
    $categoy = $row['category'];
    $price = $row['price'];
    $detail = $row['detail'];
    $stock = $row['stock'];
    $img = $row['image'];
    $imgString = explode(',',$img);
    $countimg=count($imgString);
    if($countimg== 3){
      $img1 = $imgString[0];
      $img2 = $imgString[1];
      $img3 = $imgString[2];
    }
    else if($countimg == 2){
      $img1 = $imgString[0];
      $img2 = $imgString[1];
    }
    elseif($countimg == 1){
      $img1 = $imgString[0];

    }
    $userName = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];      
}



?>




<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../seller/assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../seller/assets/js/script.js"></script>
</head>

<body>
  <div class="container-fluid fixed-top">
    <div class="row">
      <div class="col-md-12 p-0">
        <!-- Navbars start -->
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <i id="btn-menu" class="bi bi-list me-3 fs-2" type="button"></i>
            <a href="../">
              <img src="../seller/assets/img/logo-1.png" alt="" class="logo">

            </a>
            <a class="navbar-brand me-auto" href="./admin.php">Trang Qu???n Tr???</a>
            <a class="navbar-brand ms-auto" href="#"><i class="bi bi-person-workspace me-2"></i><?php echo $_SESSION['adminName'] ?></a>
          </div>
        </nav>
        <!-- Navbars end -->
      </div>
    </div>
  </div>

  <!--  -->

  <!-- Main start -->
  <div class="container-fluid main">
    <div class="row">

      <!-- Sidebar start -->
      <div class="container sidebar">
        <!-- Sidebar menu start-->
        <div class="sidebar-menu">
          <ul class="">
            <li>
              <a href="./admin.php" class="nav-link link-dark">
              <i class="bi bi-person-circle"></i>
                <span class="sidebar-item-text">Qu???n l?? t??i kho???n</span>
              </a>
            </li>
            <hr>
            <hr>
            <li>
            <a class="nav-link link-dark tour-btn " type="button" href="./products.php">
              <i class="bi bi-basket"></i>
              <span class="sidebar-item-text ms-3 ">Qu???n l?? s???n ph???m</span>
            </a>
            </li>
            <hr style="width: 100%;">
            <li>
              <a href="../partials/log-out.php" class="nav-link link-dark">
                <i class="bi bi-box-arrow-right"></i>
                <span class="sidebar-item-text">????ng xu???t</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
      <!-- Sidebar end -->

      <!-- Content start-->
      <div class="col main-right container-fluid row show">


        <div class="col-md-12 mt-2 mb-3 nav-page">
          <h5 class="text-muted"><a href="../admin.php">Trang qu???n tr???</a> / </span><a href="./products.php">Qu???n l?? s???n
              ph???m</a>/ </span><a><span>
                <?php echo $prdname ?>
              </span></a></h5>
        </div>


        <div class="col-md-12 manage-products shadow">
          <div class="row">
            <div class="row  p-3 ">
              <div class="row">
                <div class="item-menu-img col-md-4">
                  <?php               
                  //Ki???m tra h??nh ???nh
                  if($img=="")
                  {
                      //n???u kh??ng c??
                      echo "<div class='error'>Image not Available.</div>";
                  }
                  elseif($countimg == 3)
                  {
                      //n???u c??
              ?>
                  <img src="../assets/img/products/<?php echo $img1; ?>" alt="???nh <?php echo $prdname; ?>"
                    style="max-height: 200px;width:100%" class="img-fluid mt-3">
                  <img src="../assets/img/products/<?php echo $img2; ?>" alt="???nh <?php echo $prdname; ?>"
                    style="max-height: 200px;width:100%" class="img-fluid mt-3">
                    <img src="../assets/img/products/<?php echo $img3; ?>" alt="???nh <?php echo $prdname; ?>"
                    style="max-height: 200px;width:100%" class="img-fluid mt-3">

                  <?php
                    }
                    elseif($countimg==2){
                      ?>
                      <img src="../assets/img/products/<?php echo $img1; ?>" alt="???nh <?php echo $prdname; ?>"
                    style="max-height: 200px;width:100%" class="img-fluid mt-3">
                    <img src="../assets/img/products/<?php echo $img2; ?>" alt="???nh <?php echo $prdname; ?>"
                    style="max-height: 200px;width:100%" class="img-fluid mt-3">
                    <?php
                    }
                    elseif($countimg==1){
                      ?>
                      <img src="../assets/img/products/<?php echo $img1; ?>" alt="???nh <?php echo $prdname; ?>"
                    style="max-height: 200px;width:100%" class="img-fluid mt-3">
                    
                    <?php  
                  }
                  ?>
              

                </div>
                <form action="deleteProduct.php?id=<?php echo $prdid; ?>" method="POST" class="order col-md-7 mt-3">
                  <!-- Chi ti???t c???a s???n ph???m  -->
                  <div class="item-menu-desc ms-5 ">
                    <h4 class="text-center" style='color:blue'>
                      <?php echo $prdname; ?>
                    </h4>
                    <p>M?? s???n ph???m: <span style='color:red;font-weight:500;font-size:1rem'>
                        <?php echo $prdid; ?>

                      </span>
                    </p>
                    <p>Gi??: <span style='color:red;font-weight:500;font-size:1rem' id='price'>
                        <?php echo $price; ?> ??

                      </span>
                    </p>
                    <p>C??n l???i: <span style='color:red;font-weight:500;font-size:1rem'>
                        <?php echo $stock; ?>
                      </span>
                    </p>
                    <p><i class="bi bi-flag me-3"></i>Lo???i H??nh:
                      <span style='color:red;font-weight:500;font-size:1rem'>
                        <?php echo $categoy ?>
                      </span>
                    </p>
                    <p><i class="bi bi-building me-3"></i>Ng?????i b??n:
                      <span style='color:red;font-weight:500;font-size:1rem'>
                        <?php echo $userName ?>
                      </span>
                    </p>
                    <p><i class="bi bi-envelope me-3"></i>Email li??n h???:
                      <span style='color:red;font-weight:500;font-size:1rem'>
                        <?php echo $email ?>
                      </span>
                    </p>
                    <p><i class="bi bi-telephone me-3"></i>S??? ??i???n tho???i li??n h???:
                      <span style='color:red;font-weight:500;font-size:1rem'>
                        <?php echo $phone ?>
                      </span>
                    </p>
                    <p>
                      <span style='color:blue;font-weight:500;font-size:1rem'>
                        Th??ng tin v??? s???n ph???m: <br>
                      </span>
                      <?php echo $detail; ?>
                    </p>
                  </div>


                  <div class="ms-5 mt-5">
                    <a href="./products.php" class="btn btn-secondary me-4">Quay l???i</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="bi bi-trash"></i> X??a
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">X??a S???n Ph???m</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            B???n c?? ch???c ch???n mu???n x??a s???n ph???m <span class="text-danger"><?php echo $prdname; ?></span> c???a ng?????i b??n:<span class="text-danger"><?php echo $userName; ?></span> n??y ch????
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">????ng</button>
                            <input type="submit" class="btn btn-danger" value="X??a" name="btnDel"></input>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>

            <!-- H???t ?????t s???n ph???m -->
          </div>
        </div>


        <?php
include "../seller/partials/footer.php";
?>