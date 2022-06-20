<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./assets/js/scriptsSignUp.js"></script>
</head>
<body>
<header class="header-navbar container-fluid fixed-top">
    <nav class="navbar navbar-light">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
        <img src="./assets/img/GF-home.png" alt="" class="img-fluid">
        </a>
    </div>
    </nav>
</header>
<main class="container-fluid">
<div class="wrapper">
    <div class="card">
        <form action="./Login-Signup/processSignup.php" method="post" class="d-flex flex-column">
            <div class="h3 text-center text-black">Đăng Ký</div>
            <div class="d-flex align-items-center input-field my-3"> 
              <span class="fa fa-user-pen p-2"></span>  
              <input type="text" placeholder="Họ Tên" required class="form-control" id="hoten" name="hoten">  
            </div>
            <small id="nameNotification"></small>
            <div class="d-flex align-items-center input-field my-3"> 
              <span class="fa fa-user p-2"></span> 
              <input type="text" placeholder="Tên Đăng Nhập" required class="form-control" id="username" name="name"> 
            </div>
            <small id="userNotification"></small>
            <div class="d-flex align-items-center input-field my-3"> 
              <span class="fa fa-paper-plane p-2"></span> 
              <input type="email" placeholder="Email" required class="form-control" id="email" name="email"> 
            </div>
            <small id="emailNotification"></small>
            <div class="d-flex align-items-center input-field my-3"> 
              <span class="fa fa-phone p-2"></span> 
              <input type="tel" placeholder="Số Điện Thoại" required class="form-control" id="sdt" name="sdt"> 
            </div>
            <small id="userNotification"></small>
            <div class="d-flex align-items-center input-field my-3"> 
              <span class="fa fa-location-dot p-2"></span> 
              <input type="text" placeholder="Địa Chỉ" required class="form-control" id="diachi" name="diachi"> 
            </div>
            <div class="d-flex align-items-center input-field my-3">
                <span class="fas fa-lock p-2"></span> 
                <input type="password" placeholder="Mật Khẩu" required class="form-control" name="pass" id="pwd" onchange='check_pass();'> 
            </div>
            <div class="d-flex align-items-center input-field my-3 ">
                <span class="fas fa-lock p-2"></span> 
                <input type="password" placeholder="Xác Nhận Mật Khẩu" required class="form-control" id="cpwd" name="cpass"  onchange='check_pass();'>            
            </div>
            <p id="message"></p>
            <small>
            <?php
                require './config/session.php';
            ?>
            </small>
            <div class="my-3"> <input type="submit" value="Đăng ký" class="btn btn-primary" name="btnSignUp" id='Signup' disable> </div>
            <div class="mb-3"> <span class="text-light-white">Bạn đã có tài khoản?</span> 
                <a href="./login.php">Đăng nhập ngay</a> 
            </div>
        </form>
    </div>
</div>
<script>
function check_pass() {
    let message = document.getElementById('message');
    let pass = document.getElementById('pwd');
    let cpass = document.getElementById('cpwd');
    let btnSignUp = document.getElementById('Signup');
    if (pass.value == cpass.value) {
        message.innerHTML = '';
        btnSignUp.disabled = false;

    } else {
        message.style.color = 'red';
        message.innerHTML = 'Mật khẩu không trùng khớp';
        btnSignUp.disabled = true;
    }
} 

</script>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>