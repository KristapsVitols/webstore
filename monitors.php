<?php include("inc/header.php");
$monitors = $product->getAllFromCategory('Monitor');

?>

<div class="center-col">
	<ul>
	<?php
	foreach($monitors as $monitor) {
		echo "<li>
			<span class='product-category'><a href=".strtolower($monitor->category)."s.php".">".$monitor->category."</a></span>
			<a href='product.php?id=".$monitor->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$monitor->id."''><span class='product-name'>".$monitor->make." ".$monitor->model."</span></a>
			<span class='price'>Price: ".$monitor->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>

<?php include("inc/footer.php"); ?>