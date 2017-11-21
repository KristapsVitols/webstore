<?php
class User {
	private $pdo;
	private $email;
	private $fname;
	private $lname;
	private $id;
	private $phone;

	public function __construct($pdo, $email) {
		$this->pdo = $pdo;
		$this->email = $email;

		$sql = "SELECT * FROM users WHERE email=:email";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);

			if($stmt->execute()) {
				if($stmt->rowCount() === 1) {
					if($row = $stmt->fetch()) {
						$this->fname = $row['first_name'];
						$this->lname = $row['last_name'];
						$this->id = $row['id'];
						$this->phone = $row['phone'];
					}
				}
			}
		}
	}

	public function getFirstName() {
		return $this->fname;
	}

	public function getLastName() {
		return $this->lname;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function getFullName() {
		return $this->fname . ' ' . $this->lname;
	}

	public function getId() {
		return $this->id;
	}

	public function getEmail() {
		return $this->email;
	}

}
?>