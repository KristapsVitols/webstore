<?php
include("../config.php");

if(isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['quantity']) && isset($_POST['price'])) {
	$product_id = $_POST['product_id'];
	$user_id = $_POST['user_id'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];

	$sql = "INSERT INTO cart_items(user_id, product_id, quantity, price) VALUES(:user_id, :product_id, :quantity, :price)";

	if($stmt = $pdo->prepare($sql)) {
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);
		$stmt->bindParam(":product_id", $product_id, PDO::PARAM_STR);
		$stmt->bindParam(":quantity", $quantity, PDO::PARAM_STR);
		$stmt->bindParam(":price", $price, PDO::PARAM_STR);

		if($stmt->execute()) {
			return true;
		} else {
			echo "error";
		}
	}
} else {
	echo "error2x";
}
?>