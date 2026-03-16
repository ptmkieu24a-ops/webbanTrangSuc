<?php 
include ("db_connection.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Blog</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container">
    <h1>Thêm Blog</h1>
    <form action="code.php" method="POST" enctype="multipart/form-data">
        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" required>
        
        <label for="slug">Slug:</label>
        <input type="text" name="slug" required>
        
        <label for="noi_dung_ngan">Nội Dung Ngắn:</label>
        <textarea name="noi_dung_ngan" required></textarea>
        
        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" required></textarea>
        
        <label for="hinh_anh">Hình Ảnh:</label>
        <input type="file" name="hinh_anh" required>
        
        <button type="submit" name="add_blog_btn">Thêm Blog</button>
    </form>
</div>
</body>
</html>