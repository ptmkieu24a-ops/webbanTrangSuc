<?php
session_start();
include("db_connection.php");

// Kiểm tra xem sản phẩm có được gửi không
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Thêm sản phẩm vào giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity; // Tăng số lượng nếu sản phẩm đã có trong giỏ
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Thêm sản phẩm mới vào giỏ
    }

    // Chuyển hướng đến trang giỏ hàng
    header("Location: cart.php");
    exit();
} else {
    // Nếu không có sản phẩm, chuyển hướng về trang chính
    header("Location: index.php");
    exit();
}
?>
<form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <input type="number" name="quantity" value="1" min="1" style="width: 60px;" class="form-control d-inline-block">
    <button type="submit" name="add_to_cart" class="btn btn-primary mt-2">Thêm vào Giỏ</button>
</form>