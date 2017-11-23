<?php include("inc/header.php");

$cameras = $product->getAllFromCategory('Camera');

?>

<div class="center-col">
	<ul>
	<?php
	foreach($cameras as $camera) {
		echo "<li>
			<span class='product-category'><a href=".strtolower($camera->category)."s.php".">".$camera->category."</a></span>
			<a href='product.php?id=".$camera->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$camera->id."''><span class='product-name'>".$camera->make." ".$camera->model."</span></a>
			<span class='price'>Price: ".$camera->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>

<?php include("inc/footer.php"); ?>