<?php
session_start();
include("db_connection.php");
include("./includes/navbar.php");//thanh dieu huong

// Kiểm tra giỏ hàng
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='content' style='padding-top: 70px;'><p class='text-center'>Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.</p></div>";
    exit();
}

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
$product_ids = implode(',', array_keys($_SESSION['cart']));
$query = "SELECT * FROM san_pham WHERE id IN ($product_ids)";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body {
            background-color: #f8f9fa;
        }
        .content {
            padding: 30px 15px;
        }
        .table {
            border-collapse: collapse; 
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 15px; 
            text-align: center; 
            border: 1px solid #dee2e6; 
            font-size: 18px; 
        }

        .table th {
            font-weight: bold; 
            font-size: 20px; 
        }

        .table img {
            width: 100px;
            height: auto; 
        }

        h2, h3 {
            font-size: 26px; 
            margin-bottom: 20px; 
        }
        p {
            font-size: 18px; 
        }
        .text {
            font-size: 20px; 
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2; 
        }
        .table-hover tbody tr:hover {
            background-color: #e9ecef; 
        }
        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
        }

        .form-group label {
            font-size: 18px; 
        }

        .form-control {
            font-size: 18px; 
            padding: 10px; 
        }
        .form-group i {
            font-size: 20px; 
            color: #007bff; 
        }
    </style>
</head>
<body>

<div class="content">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Thanh Toán</h2>
        
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        while ($product = mysqli_fetch_assoc($result)) {
                            $product_id = $product['id'];
                            $quantity = $_SESSION['cart'][$product_id];
                            $subtotal = $product['gia_ban'] * $quantity;
                            $total += $subtotal;
                            ?>
                            <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <img src="<?php echo $product['hinh_anh']; ?>" alt="<?php echo $product['ten']; ?>" style="margin-right: 10px;">
                                    <span><?php echo htmlspecialchars($product['ten']); ?></span>
                                </div>
                            </td>
                                <td><?php echo number_format($product['gia_ban'], 2); ?> VNĐ</td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo number_format($subtotal, 2); ?> VNĐ</td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Tổng Cộng:</strong></td>
                            <td><strong><?php echo number_format($total, 2); ?> VNĐ</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="text-center mb-4">Thông Tin Khách Hàng</h3>
        <form action="process_checkout.php" method="POST">
            <div class="form-group">
                <label for="name">Họ và Tên:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <button type="submit" class="btn btn-primary">Xác Nhận Thanh Toán</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include("./includes/footer.php");?>