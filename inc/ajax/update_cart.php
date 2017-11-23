<?php
include("../config.php");

if(isset($_POST['quantity']) && isset($_POST['cartItemId'])) {
	$quantity = $_POST['quantity'];
	$cartItemId = $_POST['cartItemId'];

	$sql = "UPDATE cart_items SET quantity=:quantity WHERE id=:id";

	if($stmt = $pdo->prepare($sql)) {
		$stmt->bindParam(":quantity", $quantity, PDO::PARAM_STR);
		$stmt->bindParam(":id", $cartItemId, PDO::PARAM_STR);

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