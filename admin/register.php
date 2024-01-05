<?php 
	include '../components/connection.php';

	if(isset($_POST['register'])){

		$id = unique_id();

		$name = $_POST['name'];
		$name = filter_var($name, FILTER_SANITIZE_STRING);

		$email = $_POST['email'];
		$email = filter_var($email, FILTER_SANITIZE_STRING);

		$password = $_POST['password'];
		$password = filter_var($password, FILTER_SANITIZE_STRING);

		$image = $_FILES['image']['name'];
		$image = filter_var($image, FILTER_SANITIZE_STRING);
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = '../image/'.$image;

		$select_admin = $conn->prepare("SELECT * FROM `admin` WHERE email = ?");
		$select_admin->execute([$email]);
		
		if($select_admin->rowCount() > 0){
			$warning_msg[] = 'email already exists!';
		} else {
			if($password != $password){
				$warning_msg[] = 'confirm password not matched!';
			} else {
				$insert_admin = $conn->prepare("INSERT INTO `admin`(id, name, email, password, profile) VALUES(?,?,?,?,?)");
				$insert_admin->execute([$id, $name, $email, $password, $image]); // Change this line
				move_uploaded_file($image_tmp_name, $image_folder);
				$success_msg[] = 'new admin registered!';
			}
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
   <link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time(); ?>">
	<title>Register Page</title>
</head>
<body style="padding-left: 0 !important;">

	<div class="main-container">
		<section>
			<div class="form-container" id="login">
				<form action="" method="post" enctype="multipart/form-data">
					<h3>register now</h3>
					<div class="input-field">
						<label>Username <sup>*</sup></label>
						<input type="text" name="name" maxlength="20" required placeholder="Enter your username" oninput="this.value.replace(/\s/g,'')">
					</div>
					<div class="input-field">
						<label>email <sup>*</sup></label>
						<input type="email" name="email" maxlength="50" required placeholder="Enter your email" oninput="this.value.replace(/\s/g,'')">
					</div>
					<div class="input-field">
						<label>password <sup>*</sup></label>
						<input type="password" name="password" maxlength="20" required placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
					</div>
					<div class="input-field">
						<label>upload profile <sup>*</sup></label>
						<input type="file" name="image" accept="image/jpg, image/jpeg, image/png, image/webp">
					</div>
					<input type="submit" name="register" value="register now" class="btn">
					<p>already have an account ? <a href="login.php">login now</a></p>
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