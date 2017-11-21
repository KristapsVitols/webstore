<?php
include("../config.php");

if(isset($_POST['id'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM cart_items WHERE id=:id";

	if($stmt = $pdo->prepare($sql)) {
		$stmt->bindParam(":id", $id, PDO::PARAM_STR);

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