<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="form.css">
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
                                                <span class="header__notify-description">Đang có phiếu giảm giá 20% mua hàng ngay </span>
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
                                                <span class="header__notify-name">Mỹ phẩm Ohui chính hãng</span>
                                                <span class="header__notify-description">Mô tả Mỹ phẩm Ohui chính hãng</span>
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
                            <div class="row">
                                <div class="col-11">    <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." class="form-control d-inline-block" style="width: 566.7px; height: 40px;"></div>
                                <div class="col-1"><button type="submit" class="btn btn-primary" style="height: 40px;">
                                    <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                                </button></div>

                            </div>
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
                    <form action="cart.php" >
                        <button type="submit" class="btn btn-fe6333 "><i style="font-size:26px; color: white" class="fa">&#xf07a; </i> </button>
                    </form>
                    </div>
                </div>
            </div>
            
        </header>
