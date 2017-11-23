<?php include("inc/header.php"); ?>
<div class="container profile-container">
	<h2>Order Info</h2>
	<hr class="bottom-border">
	<div class="progressBar">
		<div class="cart selectedBar"><a href="cart.php">Cart</a></div>
		<div class="info selectedBar"><a href="delivery_info.php">Delivery info</a></div>
		<div class="payment">Payment</div>
		<div class="payment">Confirmation</div>
		<div class="success">Success</div>
	</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' class='delivery-info-form signup-form'>
					<label for="fname">Firstname: <span class="required">*</span></label>
					<input type="text" name="fname" value="<?php echo $user->getFirstName(); ?>">
					<span class="errorMessage"></span>

					<label for="fname">Lastname: <span class="required">*</span></label>
					<input type="text" name="lname" value="<?php echo $user->getLastName(); ?>">
					<span class="errorMessage"></span>

					<label for="email">Email: <span class="required">*</span></label>
					<input type="email" name="email" value="<?php echo $user->getEmail(); ?>">
					<span class="errorMessage"></span>

					<label for="phone">Phone: <span class="required">*</span></label>
					<input type="text" name="phone" value="<?php echo $user->getPhone(); ?>">
					<span class="errorMessage"></span></span>

					<label for="phone">Delivery Address: <span class="required">*</span></label>
					<input type="text" name="address" value="">
					<span class="errorMessage"></span></span>

			</form>
</div>
<?php include("inc/footer.php"); ?>
