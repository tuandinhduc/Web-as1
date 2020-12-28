<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
	// Lấy ra nội dung bài viết theo điều kiện id
	$sql = "select * from posts where id = $id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
	$sql1 = "select * from comment where post_id = $id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query1 = mysqli_query($conn,$sql1);
	


?>
			<div class="innertube">
			<?php 
				while ( $data = mysqli_fetch_array($query) ) {
			?>
				<h1 style="text-align: center;"><?php echo $data['title']; ?></h1>
				<p style="text-align: center;"> <i>Ngày tạo : <?php echo $data['createdate']; ?></i></p>
				<p><?php echo $data['content']; ?></p>
			<?php } ?>
			</div>
</br></br>
<h3>Bình luận </h3>
			<div class="innertube">
			<?php 
				while ( $data1 = mysqli_fetch_array($query1) ) {
			?>
				
				<h3><?php 
				$sql2 = "select * from users where id = $data1[user_id]";
				// Thực hiện truy vấn data thông qua hàm mysqli_query
				$query2 = mysqli_query($conn,$sql2);
				$data2 = mysqli_fetch_array($query2);
				echo $data2['fullname']; ?></h3>
				<?php echo $data1['content']; ?> <a> (</a>
				<?php echo $data1['createdate']; ?></i><a>)</a>
				
			<?php } ?>
			</div>

			<div class ="innertube">
			<form action="/action_page.php">
				<input type="text" id="fname" name="fname">
				<input type="submit" value="Thêm bình luận" >
			</form>
			</div>
		</main>
	<?php include "includes/menu.php" ?>
<?php include "includes/footer.php" ?>