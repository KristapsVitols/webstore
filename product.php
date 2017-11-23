<?php
include("inc/header.php");
if(isset($_GET['id'])) {

	$id = $_GET['id'];
	$productItem = $product->getSingleProduct($id);
}

?>
<div class="center-col showpage">
	<div class="left-side">
		<img class="detailsImage" src="assets/images/product-1.png" alt="image">
	</div>
	<hr class="side-split">
	<div class="right-side product-info">
<?php if(isset($_GET['id'])) {
	echo "<h2>".$productItem->make."
			".$productItem->model."</h2>
			<hr>
			<p>Description: ".$productItem->description."</p>
			<p>Price: ".$productItem->price."$</p>
			<p><i class='fa fa-check' aria-hidden='true'></i> In stock</p>
			<input type='hidden' class='product-id' value=".$productItem->id.">
			<input type='hidden' class='product-price' value=".$productItem->price.">";
}
?>	
		<div class='price-cart'>
	<?php
		echo "<select class='quantityMenu' id='quantity'>";
		echo selectMenu(10);
		echo "</select>";
	?>
		<?php if(isset($user)): ?>
			<?php if($cart->updateCartButton($id)): ?>
				<button class="cartBtn go-to-cart"><a href='cart.php'>Check Cart <i class="fa fa-cart-plus" aria-hidden="true"></i></a></button>
			<?php else: ?>
				<button class="cartBtn add-to-cart">Add to cart <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
			<?php endif; ?>
		<?php else: ?>
			<button class="cartBtn sign-to-add">Add to cart <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
		<?php endif; ?>
		</div>
	</div>
</div>
<?php include("inc/footer.php"); ?>
