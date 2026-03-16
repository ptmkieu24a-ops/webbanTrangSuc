<?php
session_start();
include("db_connection.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Thông báo thành công
    $_SESSION['message'] = "Sản phẩm đã được thêm vào giỏ hàng!";
    header("Location: index.php"); // Chuyển hướng về trang chính
    exit();
}

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
if (!empty($_SESSION['cart'])) {
    $product_ids = implode(',', array_keys($_SESSION['cart']));
    $query = "SELECT * FROM san_pham WHERE id IN ($product_ids)";
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem truy vấn có thành công không
    if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn)); // Hiển thị lỗi nếu có
    }
} else {
    // Nếu giỏ hàng trống, không cần thực hiện truy vấn
    $result = false; // Gán là false thay vì mảng rỗng
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="form.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .content {
            padding-top: 70px;
        }
        h2, h3 {
            font-size: 26px; 
            margin-bottom: 20px; 
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
            width: 100px; /* Đặt chiều rộng hình ảnh */
            height: auto; /* Đảm bảo chiều cao tự động */
        }
        .btn-danger {
            margin-right: 10px; /* Khoảng cách giữa các nút */
        }
    </style>
</head>
<body>


<div class="app">
        <header class="header">
             <div class="grid"> <!--tạo k/c hai bên khi màn lớn hơn 1200 -->
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--qr header__navbar-item--separate">
                            Vào cửa hàng ứng dụng
                            <div class="header__qr">
                                <img src="./assets/images/qrcode.png" alt="QR code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/images/gg_play.png" alt="Google Play" class="header__qr-dowload-img">
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/images/app_store.png" alt="App Store" class="header__qr-dowload-img">
                                    </a>
                                    </div>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-pointer">Kết nối</span>
                            <a href="" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fa-brands fa-facebook"></i>
                            </a>
                            <a href="" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
     
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-solid fa-bell"></i>
                                Thông báo
                            </a>
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3 class="header__notify-text">Thông báo mới nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-7rblg-llyqam7r7ymddd.webp" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Bạn có thông báo mới</span>
                                                <span class="header__notify-description">Đang có phiếu giảm giá 20% mua hàng ngay</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-7rblg-llyqam7r7ymddd.webp" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Bạn có thông báo mới</span>
                                                <span class="header__notify-description">Đang có phiếu giảm giá 20% mua hàng ngay</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-7rblg-llyqam7r7ymddd.webp" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Bạn có thông báo mới</span>
                                                <span class="header__notify-description">Đang có phiếu giảm giá 20% mua hàng ngay</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://down-vn.img.susercontent.com/file/sg-11134201-7rblg-llyqam7r7ymddd.webp" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Bạn có thông báo mới</span>
                                                <span class="header__notify-description">Đang có phiếu giảm giá 20% mua hàng ngay</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-solid fa-question"></i>
                                Trợ giúp
                            </a>
                        </li>
                        <a href="register.php"><li class="header__navbar-item header__navbar-item--bold header__navbar-item--separate">Đăng ký</li></a>
                        <a href="login.php"><li class="header__navbar-item header__navbar-item--bold">Đăng nhập</li></a>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="index.php"><img src="./assets/images/logo1.png" class="header__logo--img"></a>
                    </div>

                    <div class="header__search">
                        <div class="header__search-input-wrap">
                        <form action="index.php" method="GET" class="mb-4 text-center">
                            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." class="form-control d-inline-block" style="width: 566.7px; height: 40px;">
                            <button type="submit" class="btn btn-primary" style="height: 40px;">
                                <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                            <!-- Search historyhistory -->
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading"> Lịch sử tìm kiếm </h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">vòng cổ</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">vòng cổ</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">vòng cổ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="header__search-select">
                            <span class="header__search-select-label">Trong shop</span>
                            <i class="header__search-select-icon fa-solid fa-angle-down"></i>
                            
                            <ul class="header__search-option">
                                <li class="header__search-option-item header__search-option-item--active">
                                    <span>Trong shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li>
                                <li class="header__search-option-item">
                                    <span>Ngoài shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li>
                            </ul>
                        
                        </div>
                        <!-- <button class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button> -->
                    </div>

                    <div class="header__cart">
                    <a href="cart.php">
                        <button type="submit" class="btn btn-fe6333 "><i style="font-size:26px; color: white" class="fa">&#xf07a; </i> </button>
                    </a>
                    </div>
                </div>
            </div>
            
        </header>
<div class="content">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Giỏ Hàng Của Bạn</h2>

        <!-- Hiển thị thông báo nếu có -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success text-center">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị
                ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        if (isset($result) && mysqli_num_rows($result) > 0) {
                            while ($product = mysqli_fetch_assoc($result)) {
                                $product_id = $product['id'];
                                $quantity = $_SESSION['cart'][$product_id];
                                $subtotal = $product['gia_ban'] * $quantity;
                                $total += $subtotal;
                                ?>
                                <tr>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <img src="assets/images/<?php echo $product['hinh_anh']; ?>" alt="<?php echo $product['ten']; ?>" style="margin-right: 10px;">
                                        <span><?php echo htmlspecialchars($product['ten']); ?></span>
                                    </div>
                                </td>
                                    <td><?php echo number_format($product['gia_ban'], 2); ?> VNĐ</td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo number_format($subtotal, 2); ?> VNĐ</td>
                                    <td>
                                        <a href="remove_from_cart.php?id=<?php echo $product_id; ?>" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                                
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>Giỏ hàng của bạn đang trống hoặc sản phẩm không tồn tại.</td></tr>";
                        }
                        ?>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Tổng Cộng:</strong></td>
                            <td><strong><?php echo number_format($total, 2); ?> VNĐ</strong></td>
                            <td>
                                <a href="checkout.php" class="btn btn-success">Thanh Toán</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include("./includes/footer.php");?>