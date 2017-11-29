<?php include("inc/header.php"); 

$products = $product->getAllProducts();

?>
		<div class="center-col">
			<ul>
			<?php
			foreach($products as $productItem) {
				echo "<li>
					<span class='product-category'><a href='products.php?category=".strtolower($productItem->category)."'>".$productItem->category."</a></span>
					<a href='product.php?id=".$productItem->id."''><img src='assets/images/product-1.png' alt='product image'></a>
					<a href='product.php?id=".$productItem->id."''><span class='product-name'>".$productItem->make." ".$productItem->model."</span></a>
					<span class='price'>Price: ".$productItem->price."$</span>
				</li>";
			}
			?>
			</ul>
		</div>
<?php include("inc/footer.php"); ?>