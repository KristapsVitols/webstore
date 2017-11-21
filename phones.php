<?php include("inc/header.php");

$phones = $product->getAllFromCategory('Phone');

?>

<div class="center-col">
	<ul>
	<?php
	foreach($phones as $phone) {
		echo "<li>
			<span class='product-category'><a href=".strtolower($phone->category)."s.php".">".$phone->category."</a></span>
			<a href='product.php?id=".$phone->id."''><img src='assets/images/product-1.png' alt='product image'></a>
			<a href='product.php?id=".$phone->id."''><span class='product-name'>".$phone->make." ".$phone->model."</span></a>
			<span class='price'>Price: ".$phone->price."$</span>
		</li>";
	}
	?>
	</ul>
</div>

<?php include("inc/footer.php"); ?>