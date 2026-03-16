<?php
session_start(); // Khởi tạo session
include("db_connection.php");
include("./includes/navbar.php");//thanh dieu huong

// Xử lý tìm kiếm
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}

// Truy vấn sản phẩm dựa trên từ khóa tìm kiếm
$query = "SELECT * FROM san_pham WHERE trang_thai = 1 AND ten LIKE '%$search_query%'";
$result = mysqli_query($conn, $query);

?>




<div class="container mt-5">
    <h2 class="text-center phu mb-4">Sản Phẩm Nổi Bật</h2>

<?php  
    include("Carousel.php");

?>

    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($product = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                    <img src="assets/images/<?php echo $product['hinh_anh']; ?>" class="card-img-top" alt="<?php echo $product['ten']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['ten']; ?></h5>
                            <p class="card-text"><?php echo $product['mo_ta_ngan']; ?></p>
                            <p class="card-text"><strong><?php echo number_format($product['gia_ban'], 2); ?> VNĐ</strong></p>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="number" name="quantity" value="1" min="1" style="width: 60px;" class="form-control d-inline-block">
                                <button type="submit" name="add_to_cart" class="btn btn-primary mt-2">Thêm vào Giỏ</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Không có sản phẩm nào phù hợp với tìm kiếm của bạn.</p>";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php include("./includes/footer.php");?>