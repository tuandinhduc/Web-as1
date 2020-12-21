<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php
	// Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
	$sql = "select * from posts where is_public = 1 order by createdate desc limit 16";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>
			<div class="innertube">
				<table width="100%" border="1">
					<tr>
					<?php
						// Khởi tạo biến đếm $i = 0
						$i = 0;
						// Lặp dữ liệu lấy data từ cơ sở dữ liệu
						while ( $data = mysqli_fetch_array($query) ) {
							// Nếu biến đếm $i = 4, tức là vòng lặp chạy tới bài viết thứ tư thì ta thực hiện xuống hàng cho bài viết kế tiếp
							// Vì mỗi dòng hiển thị, ta chỉ hiển thị 4 bài viết
							if ($i == 4) {
								echo "</tr>";
								$i = 0;
							}
					?>
						<td >
							<b><?php echo $data["title"];// In ra title bài viết ?></b>
							<p><?php echo substr($data["content"], 0, 100)." ...";// In ra nội dung bài viết lấy chỉ 100 ký tự ?></p>
							<a href="display.php?id=<?php echo $data["id"]; // Tạo liên kết đến trang display.php và truyền vào id bài viết ?>"> Xem thêm</a>
						</td>
					
					<?php
							$i++;
						}
					?>
				</table>	
			</div>
		</main>
		
		<nav>
			<div class="innertube">
				<h3>Bài viết</h3>
				<ul>
					<li><a href="admin/them-bai-viet-ck.php">Thêm bài viết</a></li>
					<li><a href="admin/quan-ly-bai-viet.php">Quản lý bài viết</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
					<li><a href="#">Link 5</a></li>
				</ul>
				<h3>Thành viên</h3>
				<ul>
					<li><a href="admin/them-thanh-vien.php">Thêm thành viên</a></li>
					<li><a href="admin/quan-ly-thanh-vien.php">Quản lý thành viên</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
					<li><a href="#">Link 5</a></li>
				</ul>
				<h3>Cá nhân</h3>
				<?php
session_start();
if(isset($_SESSION['user_id']) == true) {
//nếu có session tên us thì ta thực hiện lệnh dưới
?>    
<p>
Xin chào: 
<?php echo $_SESSION['username']; ?>
| <a href="dang-xuat.php">Thoát</a>
<p>
<?php
}
else {
	?>
	<a href="dang-nhap.php">Đăng nhập</a>
	<?php
}
?>
				<ul>
					<li><a href="thong-tin-ca-nhan.php">Thay đổi thông tin cá nhân</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
					<li><a href="#">Link 5</a></li>
				</ul>
			</div>
		</nav>
<?php include "includes/footer.php" ?>