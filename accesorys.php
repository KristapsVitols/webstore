<?php include("inc/header.php");

$accesories = $product->getAllFromCategory('Accessory');

?>

<div class="center-col">
	<ul>
	<?php
	foreach($accesories as $accessory) {
		echo "<li>
			<span class='product-category'><a href=".strtolower($accessory->category)."s.php".">".$accessory->category."</a></span>
			<a href='product.php?id=".$accessory->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$accessory->id."''><span class='product-name'>".$accessory->make." ".$accessory->model."</span></a>
			<span class='price'>Price: ".$accessory->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>

<?php include("inc/footer.php"); ?>