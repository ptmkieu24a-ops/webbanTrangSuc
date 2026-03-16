<?php 
include ("db_connection.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
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
    <h1 class="text-center">Thêm Sản Phẩm</h1>
    <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="ten">Tên Sản Phẩm:</label>
            <input type="text" class="form-control" name="ten" required>
        </div>
        
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" class="form-control" name="slug" required>
        </div>
        
        <div class="form-group">
            <label for="mo_ta_ngan">Mô Tả Ngắn:</label>
            <textarea class="form-control" name="mo_ta_ngan" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="mo_ta">Mô Tả:</label>
            <textarea class="form-control" name="mo_ta" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="gia_goc">Giá Gốc:</label>
            <input type="text" class="form-control" name="gia_goc" required>
        </div>
        
        <div class="form-group">
            <label for="gia_ban">Giá Bán:</label>
            <input type="text" class="form-control" name="gia_ban" required>
        </div>
        
        <div class="form-group">
            <label for="so_luong">Số Lượng:</label>
            <input type="number" class="form-control" name="so_luong" required>
        </div>
        
        <div class="form-group">
            <label for="trang_thai">Trạng Thái:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="trang_thai" value="1">
                <label class="form-check-label" for="trang_thai">Kích hoạt</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="danh_muc_id">Danh Mục:</label>
            <select class="form-control" name="danh_muc_id" required>
                <?php
                $query = "SELECT * FROM danh_muc";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>{$row['ten']}</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="hinh_anh">Hình Ảnh:</label>
            <input type="file" class="form-control-file" name="hinh_anh" required>
        </div>
        <button type="submit" name="add_product_btn" class="btn btn-primary btn-block">Thêm Sản Phẩm</button><br>
        <div class="text-center">
            <a href="index.php" class="btn btn-success">Quay lại trang chính</a>
        </div>
    </form>
</div>
</body>
</html>