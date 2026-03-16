<?php 
include ("db_connection.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Danh Mục</title>
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Thêm Danh Mục</h1>
    <form action="code.php" method="POST" enctype="multipart/form-data">
        <label for="ten">Tên Danh Mục:</label>
        <input type="text" name="ten" required>
        
        <label for="slug">Slug:</label>
        <input type="text" name="slug" required>
        
        <label for="mo_ta">Mô Tả:</label>
        <textarea name="mo_ta" required></textarea>
        
        <label for="hinh_anh">Hình Ảnh:</label>
        <input type="file" name="hinh_anh" required>
        
        <button type="submit" name="add_category_btn">Thêm Danh Mục</button>
    </form>
</div>
</body>
</html>