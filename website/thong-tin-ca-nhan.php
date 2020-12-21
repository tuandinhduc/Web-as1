<?php
	session_start(); 
 ?>
<?php require_once("includes/connection.php");?>
<?php include("admin/includes/permission1.php");?>
<?php include ("includes/header.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$name = $_POST["fullname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		

		$id = $_SESSION["user_id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE users SET fullname = '$name', email = '$email', password = '$password' WHERE id=$id";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		header('Location: thong-tin-ca-nhan.php');
	}

	$id = $_SESSION["user_id"];
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM users WHERE id = ".$id;
	$query = mysqli_query($conn,$sql);

	


?>
	<?php
		while ( $data = mysqli_fetch_array($query) ) {

			$id = $_SESSION["user_id"];
			
	?>
	<form action="thong-tin-ca-nhan.php" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa thông tin cá nhân</h3>
					
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input name="fullname" id="fullname" value="<?php echo $data['fullname']; ?>" ></td>
			</tr>
            <tr>
				<td nowrap="nowrap">Mật khẩu :</td>
				<td><input type="password" name="password" id="password" value="<?php echo $data['password']; ?>" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input type="text" id="email" name="email" value="<?php echo $data['email']; ?>"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>

		</table>
		
	</form>
	<?php } ?>
<?php include "includes/footer.php" ?>