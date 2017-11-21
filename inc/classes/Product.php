<?php
class Product {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function getAllProducts() {
		$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 12";

		if($stmt = $this->pdo->prepare($sql)) {
			if($stmt->execute()) {
				$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				return $result;
			}
		}
	}

	public function getAllFromCategory($category) {
		$sql = "SELECT * FROM products WHERE category=:category";
		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(':category', $category, PDO::PARAM_STR);

			if($stmt->execute()) {
				$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				return $result;
			}
		}
	}

	public function getSingleProduct($id) {
		$sql = "SELECT * FROM products WHERE id=:id";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);

			if($stmt->execute()) {
				$result = $stmt->fetch(PDO::FETCH_OBJ);
				return $result;
			}
		}
	}

	public function getAllCartProducts($id) {
		$sql = "SELECT * FROM products WHERE id=:id";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);

			if($stmt->execute()) {
				$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				return $result;
			}
		}
	}
}
?>