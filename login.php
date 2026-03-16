<?php
session_start();
include("db_connection.php");

// Hiển thị thông báo lỗi nếu có
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị
}
?>
<!DOCTYPE html>
 <link rel="stylesheet" href="./assets/css/base.css">
 <link rel="stylesheet" href="./assets/css/main.css">

<!-- Login form -->
<div class="modal">
        <div class="modal__overlay">

        </div>
        <div class="modal__body">
                <div class="auth-form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng nhập</h3>
                            <a class="decorate-delete" href="register.php"><span class="decorate-delete auth-form__switch-btn">Đăng ký</span></a>
                        </div>
                        <form action="process_login.php" method="POST">
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" class="auth-form__input" id="username" name="username" placeholder="Nhập email của bạn">
                            </div>
                            <div class="auth-form__group">
                                <input type="password" class="auth-form__input" id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                            </div>
                        
    
    
                        </div>
    
                        <div class="auth-form__aside">
                            
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                <span class="auth-form__help-separate"></span>
                                <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>
    
                        <div class="auth-form__control">
                            
                            <a href="index.php" class="btn btn--normal auth-form__control-back">TRỞ LẠI</a>
                                                       
                            <button type="submit" name="login" class="btn btn--primary">ĐĂNG NHẬP</button>
                        </div>
                    </div>
                    </form>

                    <div class="auth-form__socials">
                        <a href="" class="auth-form__socials--facebook btn btn--size-s btn--width-icon">
                            <i class="auth-form__socials-icon fa-brands fa-square-facebook"></i>
                            <span class="auth-form__socials-title">
                                Đăng nhập với Facebook
                            </span>
                        </a>
                        <a href="" class="auth-form__socials--google btn btn--size-s btn--width-icon">
                            <i class="auth-form__socials-icon fa-brands fa-google"></i>
                            <span class="auth-form__socials-title">
                                Đăng nhập với Google
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>