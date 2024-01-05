<?php 
	include '../components/connection.php';
	
	session_start();

	if (isset($_POST['login'])) {
		
		$email = $_POST['email'];
		$email = filter_var($email, FILTER_SANITIZE_STRING);

		$password = ($_POST['password']);
		$password = filter_var($password, FILTER_SANITIZE_STRING);

		$select_admin = $conn->prepare("SELECT * FROM `admin` WHERE email = ? AND password = ?");
		$select_admin->execute([$email, $password]);

		if ($select_admin->rowCount() > 0) {
			
			$fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
			$_SESSION['admin_id'] = $fetch_admin_id['id'];
			header('location:dashboard.php');
		}else{
			$warning_msg[] = 'incorrect username or password';
		}
	}
?>
<style>
	<?php include 'admin_style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- font awesome cdn link  -->
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<title>Login Page</title>
</head>
<body style="padding-left: 0 !important;">

	<div class="main-container">
		<section>
			<div class="form-container" id="login">
				<form action="" method="post" enctype="multipart/form-data">
					<h3>login now</h3>
					<div class="input-field">
						<label>email <sup>*</sup></label>
						<input type="email" name="email" maxlength="50" required placeholder="Enter your email" oninput="this.value.replace(/\s/g,'')">
					</div>
					<div class="input-field">
						<label>password <sup>*</sup></label>
						<input type="password" name="password" maxlength="20" required placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
					</div>
					<input type="submit" name="login" value="login now" class="btn">
					<p>do not have an account ? <a href="register.php">register now</a> </p>
				</form>
			</div>
		</section>
	</div>
	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<!-- custom js link  -->
	<script type="text/javascript" src="script.js"></script>

	<?php include '../components/alert.php'; ?>
</body>
</html>
