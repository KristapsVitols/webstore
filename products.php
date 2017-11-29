<?php
include 'inc/header.php';

if(isset($_GET['category'])) {
	$category =  $_GET['category'];
	$categoryProducts = $product->getAllFromCategory($category);
?>

<div class="center-col">
	<ul>
	<?php
	foreach($categoryProducts as $product) {
		echo "<li>
			<span class='product-category'><a href='products.php?category=".strtolower($product->category)."'>".$product->category."</a></span>
			<a href='product.php?id=".$product->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$product->id."''><span class='product-name'>".$product->make." ".$product->model."</span></a>
			<span class='price'>Price: ".$product->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>
<?php }
?>
<?php include 'inc/footer.php'; ?>
