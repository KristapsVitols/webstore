<?php
include("../config.php");

if(isset($_POST['inputValue'])) {
	$inputVal = '%'.$_POST['inputValue'].'%';
	$removeLastLetter = substr($_POST['inputValue'], 0, -1);
	$inputVal2 = $removeLastLetter;
	$sql = "SELECT * FROM products WHERE
			category LIKE :inputVal ||
			make LIKE :inputVal ||
			model LIKE :inputVal ||
			description LIKE :inputVal ||
			category LIKE :inputVal2 ||
			make LIKE :inputVal2 ||
			model LIKE :inputVal2 ||
			description LIKE :inputVal2
			";
	if($stmt = $pdo->prepare($sql)) {
		$stmt->bindParam(':inputVal', $inputVal, PDO::PARAM_STR);
		$stmt->bindParam(':inputVal2', $inputVal2, PDO::PARAM_STR);
		if($stmt->execute()) {
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
			// $result = json_encode($result);
			echo json_encode($result);
		}
	}
}
?>

