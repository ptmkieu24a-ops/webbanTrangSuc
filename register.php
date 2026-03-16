<?php
/*
include("db_connection.php");
//include("navbar.php"); // Bao gồm thanh điều hướng


if (isset($_POST['register'])) {
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $query = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, email) VALUES ('$ten_dang_nhap', '$mat_khau', '$email')";
    if (mysqli_query($conn, $query)) {
        header("Location: login.php?success=Đăng ký thành công");
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
    */
    
    include("db_connection.php");
    
    if (isset($_POST['register'])) {
        $ten_dang_nhap = trim($_POST['ten_dang_nhap']);
        $email = trim($_POST['email']);
        $mat_khau = $_POST['mat_khau'];
        $nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];
    
        // Kiểm tra mật khẩu khớp
        if ($mat_khau !== $nhap_lai_mat_khau) {
            echo "Mật khẩu nhập lại không khớp!";
            exit();
        }
    
        // Băm mật khẩu
        $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
    
        // Sử dụng prepared statement
        $stmt = $conn->prepare("INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $ten_dang_nhap, $hashed_password, $email);
    
        if ($stmt->execute()) {
            header("Location:login.php?success=Đăng ký thành công");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
    
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.7.2/css/all.min.css">
    
</head>
<body>
    <div class="modal">
        <div class="modal__overlay">

        </div>
        <div class="modal__body">
            <div class="auth-form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng ký</h3>
                            <a class="decorate-delete" href="login.php"><span class="decorate-delete auth-form__switch-btn">Đăng nhập</span></a>
                        </div>
                        <form action="register.php" method="POST">
                        <div class="auth-form__form">
                            
                            <div class="auth-form__group">
                                <input type="text" name="email" class="auth-form__input" placeholder="Nhập email của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="text" name="ten_dang_nhap" class="auth-form__input" placeholder="Nhập tên đăng nhập"required>
                            </div>
                            <div class="auth-form__group">
                                <input type="password" name="mat_khau" class="auth-form__input" placeholder="Nhập mật khẩu của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" name="nhap_lai_mat_khau" class="auth-form__input" placeholder="Nhập lại mật khẩu của bạn">
                            </div>
                        
    
                        </div>
    
                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng ký, bạn đã đồng ý với World's shop về
                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> & <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>
    
                        <div class="auth-form__control">
                            
                            <a class="btn btn--normal auth-form__control-back" href="index.php">TRỞ LẠI</a>
                            
                            <button type="submit" name="register" class="btn btn--primary">ĐĂNG KÝ</button>
                        </div>
                    </div>
                        </form>

                    <div class="auth-form__socials">
                        <a href="" class="auth-form__socials--facebook btn btn--size-s btn--width-icon">
                            <i class="auth-form__socials-icon fa-brands fa-square-facebook"></i>
                            <span class="auth-form__socials-title">
                                Kết nối với Facebook
                            </span>
                        </a>
                        <a href="" class="auth-form__socials--google btn btn--size-s btn--width-icon">
                            <i class="auth-form__socials-icon fa-brands fa-google"></i>
                            <span class="auth-form__socials-title">
                                Kết nối với Google
                            </span>
                        </a>
                    </div>
                </div> 
            </div>
        </div>
    </div>

<!-- <div class="container">
    <h1 class="mt-5">Đăng Ký Tài Khoản</h1>
    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="ten_dang_nhap">Tên Đăng Nhập:</label>
            <input type="text" name="ten_dang_nhap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mat_khau">Mật Khẩu:</label>
            <input type="password" name="mat_khau" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" name="register" class="btn btn-primary">Đăng Ký</button>
    </form>
    <p class="mt-3">Đã có tài khoản? <a href="login.php">Đăng Nhập</a></p>
</div> -->
</body>
</html>

