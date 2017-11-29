<?php
class Account {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function validateEmail($email) {
		$sql = "SELECT * FROM users WHERE email=:email";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);

			if($stmt->execute()) {

				if($stmt->rowCount() == 1) {
					return true;
				} else {
					return false;
				}
			} else {
				die("Something went wrong");
			}
		}
		unset($stmt);
	}

	public function register($fname, $lname, $email, $phone, $password) {
		$sql = "INSERT INTO users(email, first_name, last_name, phone, password) VALUES(:email, :fname, :lname, :phone, :password)";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
			$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
			$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
			$stmt->bindParam(':password', $password, PDO::PARAM_STR);

			if($stmt->execute()) {
				session_start();
				$_SESSION['register_message'] = "You have successfuly registered and can log in now!";
				header("Location: login.php");
			} else {
				die("Something went wrong!");
			}
		}
	}

	public function login($email, $pw) {
		$sql = "SELECT email, password FROM users WHERE email=:email";

		if($stmt = $this->pdo->prepare($sql)) {
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);

			if($stmt->execute()) {
				if($stmt->rowCount() === 1) {
					if($row = $stmt->fetch()) {
						$hashed_password = $row['password'];

						if(password_verify($pw, $hashed_password)) {
							return true;
						} else {
							return false;
						}
					}
				}
			}
		}
	}
}
?>

				
