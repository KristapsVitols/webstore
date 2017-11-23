<?php
class Cart {
	private $pdo;
	private $user_id;

	public function __construct($pdo, $user_id) {
		$this->pdo = $pdo;
		$this->user_id = $user_id;
	}

	public function getCartItems() {
		$sql = "SELECT * FROM cart_items WHERE user_id=:user_id";

		if($stmt = $this->pdo->prepare($sql)) {

			$stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_STR);

			if($stmt->execute()) {
				if($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
					return $row;
				}
			}
		}
	}

	public function getCartSum() {
		$sql = "SELECT * FROM cart_items WHERE user_id=:user_id";
		$totalSum = '';

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_STR);

			if($stmt->execute()) {
				if($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
					foreach($row as $cartItem) {
						$totalSum += $cartItem->price * $cartItem->quantity;
					}
					return $totalSum;
				}
			}
		}

	}

	public function countCartItems() {
		$sql = "SELECT COUNT(*) AS count FROM cart_items WHERE user_id=:user_id";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(":user_id", $this->user_id, PDO::PARAM_STR);

			if($stmt->execute()) {
				if($row = $stmt->fetch(PDO::FETCH_OBJ)) {
					return $row->count;
				}
			}
		}
	}

	public function updateCartButton($product_id) {
		$sql = "SELECT * FROM cart_items WHERE user_id=:user_id";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(":user_id", $this->user_id, PDO::PARAM_STR);

			if($stmt->execute()) {
				if($row = $stmt->fetchAll(PDO::FETCH_OBJ)) {
					foreach($row as $item) {
						if($product_id == $item->product_id) {
							return true;
						}
					}
				}
			}
		}
	}
}
?>