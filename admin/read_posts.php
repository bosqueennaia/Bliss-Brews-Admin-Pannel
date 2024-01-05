<?php 
	 include '../components/connection.php';
	 session_start();

	 $admin_id = $_SESSION['admin_id'];

	 if (!isset($admin_id)) {
	 	header('location: admin_login.php');
	 }

	 $get_id = $_GET['post_id'];
	 //delete post from database
	 if (isset($_POST['delete'])) {
	 	$p_id = $_POST['product_id'];
	 	$p_id = filter_var($p_id, FILTER_SANITIZE_STRING);

	 	$delete_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
	 	$delete_image->execute([$p_id]);

	 	$fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
	 	if ($fetch_delete_image[''] != '') {
	 		unlink('../image/'.$fetch_delete_image['image']);
	 	}
	 	$delete_post = $conn->prepare("DELETE FROM `products` WHERE id=?");
	 	$delete_post->execute([$p_id]);
	 	header('location:view_product.php');
	 }
	 if (isset($_POST['delete_comment'])) {
	 	$comment_id = $_POST['comment_id'];
	 	$comment_id= filter_var($comment_id, FILTER_SANITIZE_STRING);
	 	$delete_comment = $conn->prepare("DELETE FROM `reviews` WHERE id = ?");
	 	$delete_comment->execute([$comment_id]);
	 	$message[] = 'comment delete!';
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
	<title>Read Product</title>
</head>
<body>
	
		<?php include '../components/admin_header.php'; ?>
		<div class="main">
		<div class="banner">
			<h1>dashboard</h1>
		</div>
		<div class="title2">
			<a href="dashboard.php">home </a><span>/ read products</span>
		</div>
		<section class="read-post">
			<h1 class="heading">read product</h1>
			<?php 
				$select_product = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
				$select_product->execute([$get_id]);
				if ($select_product->rowCount() > 0) {
					while($fetch_posts = $select_product->fetch(PDO::FETCH_ASSOC)){

				?>
				<form method="post">
					<input type="hidden" name="product_id" value="<?= $fetch_posts['id']; ?>">
					<div class="status" style="background-color: <?php if($fetch_posts['status'] == 'active'){echo 'limegreen'; }else{echo "coral";} ?>;"><?= $fetch_posts['status'] ?></div>
					<?php if($fetch_posts['image'] != ''){ ?>
						<img src="../image/<?= $fetch_posts['image'] ?>" class="image">
					<?php } ?>
					<div class="price">$<?= $fetch_posts['price'] ?></div>
					<div class="title"><?= $fetch_posts['name'] ?></div>
					<div class="content"><?= $fetch_posts['product_detail'] ?></div>
					<div class="flex-btn">
						<a href="edit_post.php?id=<?= $fetch_posts['id']; ?>" class="btn">edit</a>
						<button type="submit" name="delete" class="btn" onclick="return confirm('delete this post?')">delete</button>
						<a href="view_product.php?id=<?= $post_id ?>" class="btn">go back</a>
					</div>
				</form>
				<?php 
						}
					}else{

							echo '
								<div class="empty">
									<p>no post added yet! <br><a href="add_posts.php" class="btn" style="margin-top: 1.5rem;">add product</a></p>
								</div>
							';
						}
				?>
			</div>
			
	</div>
	
	<script type="text/javascript" src="script.js"></script>
</body>
</html>