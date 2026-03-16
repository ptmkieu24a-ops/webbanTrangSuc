<?php
include("db_connection.php"); // Kết nối đến cơ sở dữ liệu

if (isset($_POST['add_product_btn'])) {
    $ten = $_POST['ten'];
    $slug = $_POST['slug'];
    $mo_ta_ngan = $_POST['mo_ta_ngan'];
    $mo_ta = $_POST['mo_ta'];
    $gia_goc = $_POST['gia_goc'];
    $gia_ban = $_POST['gia_ban'];
    $so_luong = $_POST['so_luong'];
    $trang_thai = isset($_POST['trang_thai']) ? 1 : 0;
    $danh_muc_id = $_POST['danh_muc_id'];

    // Xử lý hình ảnh
    if (isset($_FILES['hinh_anh'])) {
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        move_uploaded_file($hinh_anh_tmp, "assets/images/$hinh_anh");
    }

    // Thêm sản phẩm vào cơ sở dữ liệu
    $query = "INSERT INTO san_pham (ten, slug, mo_ta_ngan, mo_ta, gia_goc, gia_ban, so_luong, trang_thai, danh_muc_id, hinh_anh) VALUES ('$ten', '$slug', '$mo_ta_ngan', '$mo_ta', '$gia_goc', '$gia_ban', '$so_luong', '$trang_thai', '$danh_muc_id', '$hinh_anh')";
    mysqli_query($conn, $query);
    header("Location: add-product.php?success=Thêm sản phẩm thành công");
}

if (isset($_POST['add_category_btn'])) {
    $ten = $_POST['ten'];
    $slug = $_POST['slug'];
    $mo_ta = $_POST['mo_ta'];

    // Xử lý hình ảnh
    if (isset($_FILES['hinh_anh'])) {
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        move_uploaded_file($hinh_anh_tmp, "assets/images/$hinh_anh");
    }

    // Thêm danh mục vào cơ sở dữ liệu
    $query = "INSERT INTO danh_muc (ten, slug, mo_ta, hinh_anh) VALUES ('$ten', '$slug', '$mo_ta', '$hinh_anh')";
    mysqli_query($conn, $query);
    header("Location: add-category.php?success=Thêm danh mục thành công");
}

if (isset($_POST['add_blog_btn'])) {
    $tieu_de = $_POST['tieu_de'];
    $slug = $_POST['slug'];
    $noi_dung_ngan = $_POST['noi_dung_ngan'];
    $noi_dung = $_POST['noi_dung'];

    // Xử lý hình ảnh
    if (isset($_FILES['hinh_anh'])) {
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        move_uploaded_file($hinh_anh_tmp, "assets/images/$hinh_anh");
    }

    // Thêm blog vào cơ sở dữ liệu
    $query = "INSERT INTO blog (tieu_de, slug, noi_dung_ngan, noi_dung, hinh_anh) VALUES ('$tieu_de', '$slug', '$noi_dung_ngan', '$noi_dung', '$hinh_anh')";
    mysqli_query($conn, $query);
    header("Location: add-blog.php?success=Thêm blog thành công");
}
?>