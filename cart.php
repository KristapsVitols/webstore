<?php
include("inc/header.php");

if(!isset($_SESSION['email'])) {
	header("Location: index.php");
}

//Cart total sum
$totalSum = '';

?>

<div class="container profile-container">
	<h2>Cart</h2>
	<hr class="bottom-border">
	<div class="progressBar">
		<div class="cart selectedBar"><a href="cart.php">Cart</a></div>
		<div class="info">Delivery info</div>
		<div class="payment">Payment</div>
		<div class="payment">Confirmation</div>
		<div class="success">Success</div>
	</div>
	<?php if(isset($user)) { 
			if($cart->countCartItems() > 0) {
				foreach($cart->getCartItems() as $item) {
					foreach($product->getAllCartProducts($item->product_id) as $productInfo) {
					echo "<div class='cart-item cart-page'>
							<div class='cart-1'>
								<div class='inner-cart-1'>
									<img class='cart-image' src='assets/images/product-1.png' alt='product-image'>
									<a href='product.php?id=".$productInfo->id."'>".$productInfo->model." ".$productInfo->make."</a>
								</div>
								<div class='cartRelative' data-value=".$item->id.">"; ?>
									<select class='quantityMenu changeCart'>
										<?php echo selectMenu(10, $item->quantity); ?>
									</select>
								<?php
									echo "<span class='final-price'>".($item->quantity * $productInfo->price)." $</span>
								</div>
							</div>
							<i data-value=".$item->id." id='removeCartItem' class='fa fa-times' aria-hidden='true'><span class='removeBtnText'> Delete</span></i>
						</div>";
						}
						$totalSum += ($item->quantity * $productInfo->price);
					}

			} else {
				echo "<div>You have no items.</div>";
			}
		}
	?>
	<div class='totalSumContainer'><span class="totalCartSum">Total:</span> <?php echo $totalSum; ?> $</div>
	<a href='' class="nextCartStep">Next</a>
</div>

<?php include("inc/footer.php"); ?>
