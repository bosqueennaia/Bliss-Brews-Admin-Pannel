<?php 
	 include '../components/connection.php';
	 session_start();

	 $admin_id = $_SESSION['admin_id'];

	 if (!isset($admin_id)) {
	 	header('location: login.php');
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
	<title>Dashboard Page</title>
</head>
<body>
	<?php include '../components/admin_header.php'; ?>
	<div class="main">
		<div class="banner">
			<h1>dashboard</h1>
		</div>
		<div class="title2">
			<a href="dashboard.php">home </a><span>/ dashboard</span>
		</div>
		<section class="dashboard">
			<h1 class="heading">dashboard</h1>
			<div class="box-container">
				<div class="box">
					<h3>welcome!</h3>
					<p><?=$fetch_profile['name']; ?></p>
					<a href="update_profile.php" class="btn">update profile</a>
				</div>
				<div class="box">
					<?php 
						$select_product = $conn->prepare("SELECT * FROM `products`");
						$select_product->execute();
						$number_of_product = $select_product->rowCount();
					?>
					<h3><?= $number_of_product; ?></h3>
					<p>products added</p>
					<a href="add_product.php" class="btn">add new post</a>
				</div>
				<div class="box">
					<?php 
						$select_active_product = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
						$select_active_product->execute(['active']);
						$number_of_active_product = $select_active_product->rowCount();
					?>
					<h3><?= $number_of_active_product; ?></h3>
					<p>total active products</p>
					<a href="view_product.php" class="btn">view active products</a>
				</div>
				
				<<div class="box">
					<?php 
						$select_deactive_product = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
						$select_deactive_product->execute(['deactive']);
						$number_of_deactive_product = $select_deactive_product->rowCount();
					?>
					<h3><?= $number_of_deactive_product; ?></h3>
					<p>total deactive products</p>
					<a href="view_product.php" class="btn">view deactive products</a>
				</div>
				<div class="box">
					<?php 
						$select_users = $conn->prepare("SELECT * FROM `users`");
						$select_users->execute();
						$number_of_users = $select_users->rowCount();
					?>
					<h3><?= $number_of_users; ?></h3>
					<p>users account</p>
					<a href="user_accounts.php" class="btn">view users</a>
				</div>
				<div class="box">
					<?php 
						$select_admin = $conn->prepare("SELECT * FROM `admin`");
						$select_admin->execute();
						$number_of_admin = $select_admin->rowCount();
					?>
					<h3><?= $number_of_admin; ?></h3>
					<p>admin account</p>
					<a href="admin_accounts.php" class="btn">view admin</a>
				</div>
				<div class="box">
					<?php
			         $select_message = $conn->prepare("SELECT * FROM `message`");
			         $select_message->execute();
			         $select_message->execute();
			         $numbers_of_message = $select_message->rowCount();
			      ?>
			      <h3><?= $numbers_of_message; ?></h3>
			      <p>messages added</p>
			      <a href="admin_message.php" class="btn">view messages</a>
				</div>
			   <div class="box">
			      <?php
			         $select_canceled_order = $conn->prepare("SELECT * FROM `orders` WHERE status = ?");
			         $select_canceled_order->execute(['canceled']);
			         $total_canceled_order = $select_canceled_order->rowCount();
			      ?>
			      <h3><?= $total_canceled_order; ?></h3>
			      <p>total canceled order</p>
			      <a href="admin_order.php" class="btn">view orders</a>
			   </div>
			   <div class="box">
			      <?php
			         $select_confirm_order = $conn->prepare("SELECT * FROM `orders` WHERE status = ?");
			         $select_confirm_order->execute(['in progress']);
			         $total_confirm_order = $select_confirm_order->rowCount();
			      ?>
			      <h3><?= $total_confirm_order; ?></h3>
			      <p>total order in progress</p>
			      <a href="admin_order.php" class="btn">view orders</a>
			   </div>
			   <div class="box">
			      <?php
			         $select_total_order = $conn->prepare("SELECT * FROM `orders`");
			         $select_total_order->execute();
			         $total_total_order = $select_total_order->rowCount();
			      ?>
			      <h3><?= $total_total_order; ?></h3>
			      <p>total order placed</p>
			      <a href="admin_order.php" class="btn">view orders</a>
			   </div>
			</div>

		</section>
	</div>
	
	<script src="script.js"></script>
</body>
</html>