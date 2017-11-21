<?php
include("config.php");
include("classes/Product.php");
include("classes/Account.php");
include("classes/User.php");
include("classes/Cart.php");
$product = new Product($pdo);
$account = new Account($pdo);

session_start();
if(isset($_SESSION['email'])) {
	$user = new User($pdo, $_SESSION['email']);
	$cart = new Cart($pdo, $user->getId());
}

//Highlight currently selected section link
function selectedClass($current) {
	$currentFile = basename($_SERVER['REQUEST_URI'], '.php');

	if ($currentFile == $current) echo 'class=selected';
}

//Generate select menus
function selectMenu($num, $quantity = '1') {
	for($i = 1; $i <= $num; $i++) {
		if($i == $quantity) {
			echo "<option value=".$i." selected>".$i."</option>";
		} else {
			echo "<option value=".$i.">".$i."</option>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Web Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="header-container">
			<div class="logo">
				<a href="index.php">
					<h1><span class="heading-first">WEB</span><span class="heading-second">STORE</span></h1>
				</a>
			</div>
			<div class="mid-header">
				<div class="contact-info">
					<span><i class="fa fa-mobile" aria-hidden="true"></i> +371-29554669</span>
					<span><i class="fa fa-envelope-o" aria-hidden="true"></i> support@webstore.com</span>
				</div>
				<div class="search-bar">
					<input type="text" name="search" id="searchBar" placeholder="Search for a product..."><i id="searchBtn" class="fa fa-search" aria-hidden="true"></i>
				</div>
			</div>
			<div class="right-side">
				<nav>
					<?php if(!isset($user)): ?>
					<li><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
					<li><a href='login.php' id='loginBtn'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a></li>
					<?php else: ?>
					<li><a href='#' id='logoutBtn'><i class='fa fa-sign-out' aria-hidden='true'></i> Logout</a></li>
					<?php endif; ?>
					<li><a href="info.php"><i class="fa fa-info" aria-hidden="true"></i> Info</a></li>
				</nav>
				<?php if(isset($user)): ?>
				<div class="user-bar">
					<span class="fullname"><?php echo $user->getFullName(); ?></span>
					<div class="cart-box">
						<i id="shopping-cart" class="fa fa-2x fa-shopping-cart" aria-hidden="true"></i>
						<?php if($cart->countCartItems() > 0): ?>
							<span class="cart-count"><?php echo $cart->countCartItems(); ?></span>
						<?php endif; ?>
					</div>
					<div class="cart-items">
						<h3>Cart</h3>
						<span class='totalSum'>Total: <?php echo $cart->getCartSum(); ?>$</span>
						<hr>
					<?php if(isset($user)) { 
							if($cart->countCartItems() > 0) {
								foreach($cart->getCartItems() as $item) {
									foreach($product->getAllCartProducts($item->product_id) as $productInfo) {
									echo "<div class='cart-item'>
											<a href='product.php?id=".$productInfo->id."'>".$productInfo->model." ".$productInfo->make."</a>
											<i data-value=".$item->id." id='removeCartItem' class='fa fa-times cross' aria-hidden='true'></i>
											<div class='price-quantity'>
												<span>".$item->quantity."x</span>
												<span>".($productInfo->price * $item->quantity)." $</span>
											</div>
										</div>
										<hr>";
										}
									}
							} else {
								echo "<div>You have no items.</div>";
							}
						}
					?>
					<?php if($cart->countCartItems() != 0): ?>
						<a href='cart.php' class="buynow">Buy</a>
					<?php endif; ?>
					</div>
					<a title="Your Profile" href="profile.php?id=<?php echo $user->getId(); ?>"><i class="fa fa-2x fa-user" aria-hidden="true"></i></a>
					<i title="Notifications" class="fa fa-2x fa-bell" aria-hidden="true"></i>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="left-col">
			<ul>
				<li><a href="phones.php" <?php echo selectedClass('phones'); ?>><i class="fa fa-mobile" aria-hidden="true"></i> Phones</a></li>
				<li><a href="computers.php" <?php echo selectedClass('computers'); ?>><i class="fa fa-laptop" aria-hidden="true"></i> Computers</a></li>
				<li><a href="monitors.php" <?php echo selectedClass('monitors'); ?>><i class="fa fa-desktop" aria-hidden="true"></i> Monitors</a></li>
				<li><a href="cameras.php" <?php echo selectedClass('cameras'); ?>><i class="fa fa-camera" aria-hidden="true"></i> Cameras</a></li>
				<li><a href="accesorys.php" <?php echo selectedClass('accesorys'); ?>><i class="fa fa-cog" aria-hidden="true"></i> Accesories</a></li>
				<li><a href="others.php" <?php echo selectedClass('others'); ?>><i class="fa fa-cubes" aria-hidden="true"></i> Other</a></li>
			</ul>
		</div>