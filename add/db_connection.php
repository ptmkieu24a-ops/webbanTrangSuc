<?php
$host = "localhost"; // Thay đổi nếu cần
$user = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$db_name = "web_ban_trang_suc"; // Tên cơ sở dữ liệu của bạn

$conn = mysqli_connect($host, $user, $password, $db_name);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>