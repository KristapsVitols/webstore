<?php include("inc/header.php");

$computers = $product->getAllFromCategory('Computer');

?>

<div class="center-col">
	<ul>
	<?php
	foreach($computers as $computer) {
		echo "<li>
			<span class='product-category'><a href=".strtolower($computer->category)."s.php".">".$computer->category."</a></span>
			<a href='product.php?id=".$computer->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$computer->id."''><span class='product-name'>".$computer->make." ".$computer->model."</span></a>
			<span class='price'>Price: ".$computer->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>

<?php include("inc/footer.php"); ?>