<?php include("inc/header.php");

$others = $product->getAllFromCategory('Other');

?>

<div class="center-col">
	<ul>
	<?php
	foreach($others as $other) {
		echo "<li>
			<span class='product-category'><a href=".strtolower($other->category)."s.php".">".$other->category."</a></span>
			<a href='product.php?id=".$other->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$other->id."''><span class='product-name'>".$other->make." ".$other->model."</span></a>
			<span class='price'>Price: ".$other->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>

<?php include("inc/footer.php"); ?>