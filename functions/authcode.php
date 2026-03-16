<?php
session_start();
include("../db_connection.php"); // Đảm bảo đường dẫn đúng đến tệp kết nối cơ sở dữ liệu

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Truy vấn để kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE email = '$email'"; // Giả sử bạn có bảng users với trường email
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Kiểm tra mật khẩu (nên sử dụng password_verify nếu mật khẩu được mã hóa)
        if ($user['password'] === $password) { // Thay đổi để sử dụng password_verify nếu mật khẩu được mã hóa
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; // Giả sử bạn có trường username
            header("Location: ../index.php"); // Chuyển hướng về trang chính
            exit();
        } else {
            $_SESSION['error'] = "Mật khẩu không đúng.";
            header("Location: ../login.php"); // Quay lại trang đăng nhập
            exit();
        }
    } else {
        $_SESSION['error'] = "Email không tồn tại.";
        header("Location: ../login.php"); // Quay lại trang đăng nhập
        exit();
    }
}
?>