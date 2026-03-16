<?php
session_start();
include("db_connection.php");

// Kiểm tra xem ID sản phẩm có được truyền vào không
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Kiểm tra xem sản phẩm có trong giỏ hàng không
    if (isset($_SESSION['cart'][$product_id])) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION['cart'][$product_id]);
        
        // Nếu giỏ hàng trống, xóa session cart
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }
}

// Chuyển hướng về trang giỏ hàng
header("Location: cart.php");
exit();
?>