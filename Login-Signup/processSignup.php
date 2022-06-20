<?php

if( !isset($_POST['btnSignUp']) ){
    header("location: ../signup.php");
}
else{
    $name = $_POST['hoten'];
    $user = $_POST['name'];
    $email = $_POST['email'];
    $tlp = $_POST['sdt'];
    $address = $_POST['diachi'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $user= htmlspecialchars($user);
    $email = htmlspecialchars($email); 
    $name = htmlspecialchars($name); 
    $tlp = htmlspecialchars($tlp); 
    $address = htmlspecialchars($address); 
    $pass= htmlspecialchars($pass);
    $cpass= htmlspecialchars($cpass);
    require '../config/constants.php';
    $sql = "SELECT * FROM users WHERE username='$user' OR email='$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['error'] = "Username hoặc Email đã tồn tại";
        header("location: ../signup.php");
    }
    
    else if($cpass != $pass){
        $_SESSION['error'] = "Mật khẩu xác nhận không chính xác";
        header("location: signup.php");
        }
        else {
        $token = md5($_POST['email']).rand(10,9999);
        $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql3 = "INSERT INTO users (fullname,username, email,phone,address,password, email_verification_link ) VALUES('$name','$user', '$email', '$tlp', '$address' , '$pass_hash' , '$token')";
        $result3 = mysqli_query($conn,$sql3);
        $link = "<a href='http://localhost/gofish/Login-Signup/verifyMail.php?key=".$email."&token=".$token."'>Kích hoạt tài khoản</a>";
        if($result3 == true){
            require "./sendMail.php";
            if(sendEmailForAccountActive($email,$link)){
                echo "Vui lòng kiểm tra hộp thư của bạn để kích hoạt tài khoản";
            }
            else{
                echo "Xin lỗi email chưa được gửi đi. Vui lòng kiểm tra thông tin tài khoản";
            }
        }
        else{
            $_SESSION['error'] = "Có lỗi";
            header("location: ../signup.php"); //Chuyển hướng, hiển thị thông báo lỗi
    }
            
    
    mysqli_close($conn); 
    }
}





?>