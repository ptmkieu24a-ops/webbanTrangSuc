<?php
/*
session_start();
include("db_connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Sử dụng câu lệnh chuẩn bị
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Sử dụng password_verify nếu mật khẩu được mã hóa
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; // Giả sử có trường username
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['error'] = "Mật khẩu không đúng.";
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Email không tồn tại.";
        header("Location: ../login.php");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
    */
    
    session_start();
    include("db_connection.php"); // Đảm bảo đường dẫn chính xác
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $email = $_POST['username'];
        $password = $_POST['password'];
        
        // Sử dụng Prepared Statements để bảo mật
        $stmt = $conn->prepare("SELECT * FROM nguoi_dung WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
    
            // Kiểm tra mật khẩu (nên sử dụng password_verify nếu mật khẩu được mã hóa)
            if (password_verify($password, $user['mat_khau'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['email']; // Giả sử bạn có trường username
                header("Location: index.php"); // Chuyển hướng về trang chính
                exit();
            } else {
                $_SESSION['error'] = "Mật khẩu không đúng.";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Email không tồn tại.";
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
    
    
?>
