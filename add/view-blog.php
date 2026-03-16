<?php 
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Blog Trang Sức</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .blog-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .blog-content {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Khám Phá Thế Giới Trang Sức</h1>
    <img src="assets/images/blog.avif" alt="Trang sức" class="blog-image">
    
    <div class="blog-content">
        <h2>Ý Nghĩa Của Trang Sức</h2>
        <p>Trang sức không chỉ là những món đồ trang trí, mà còn là biểu tượng của phong cách và cá tính. Mỗi món trang sức đều mang trong mình một câu chuyện riêng, từ những viên đá quý lấp lánh đến những thiết kế tinh xảo.</p>
        
        <h2>Chọn Lựa Trang Sức Phù Hợp</h2>
        <p>Khi chọn trang sức, hãy cân nhắc đến phong cách cá nhân và dịp sử dụng. Một chiếc nhẫn đơn giản có thể phù hợp cho hàng ngày, trong khi một bộ trang sức lấp lánh sẽ là lựa chọn hoàn hảo cho các sự kiện đặc biệt.</p>
        
        <h2>Cách Bảo Quản Trang Sức</h2>
        <p>Để giữ cho trang sức luôn đẹp như mới, hãy bảo quản chúng ở nơi khô ráo, tránh tiếp xúc với hóa chất và thường xuyên lau chùi bằng vải mềm.</p>
        
        <h2>Trang Sức Là Món Quà Ý Nghĩa</h2>
        <p>Trang sức là món quà tuyệt vời cho những người bạn yêu thương. Một chiếc vòng cổ hay một đôi bông tai có thể là món quà hoàn hảo cho sinh nhật, kỷ niệm hay bất kỳ dịp đặc biệt nào.</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>