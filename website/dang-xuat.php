<?php
session_start();

if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != NULL){
    unset($_SESSION['user_id']);
    echo 'Bạn đã đăng xuất thành công.';
}

?>
<a href="dang-nhap.php">Đăng nhập lại?</a>