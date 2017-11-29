<?php
include("inc/header.php");

if(isset($_SESSION['register_message'])) {
	$register_message = $_SESSION['register_message'];
	unset($_SESSION['register_message']);
}
//Init variables
$email = $password = '';

$email_err = $password_err = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	//Remove spaces and stuff
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	//Validate Email
	if(empty($email)) {
		$email_err = "Please enter an email";
	} else {
		if(!$account->validateEmail($email)) {
			$email_err = "Email does not exist";
		}
	}

	//Validate Password
	if(empty($password)) {
		$password_err = "Please enter a password";
	} else {
		if(!$account->login($email, $password)) {
			$password_err = "Wrong password";
		}
	}

	//Begin register process
	if(empty($email_err) && empty($password_err)) {
		// $account->login($email, $password);
		session_start();
		$_SESSION['email'] = $email;
		header("Location: index.php");
	}
}

?>

	<div class="container signup-container">
		<h2>Login</h2>
		<hr class="bottom-border">
		<div class="inner-container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' class="signup-form">
					<?php if(isset($register_message)) { echo "<span class='found register-message'>".$register_message."</span>"; }?>

					<label for="email">Email: <span class="required">*</span></label>
					<input type="email" name="email" class="<?php if(!empty($email_err)) { echo 'invalid'; } if(empty($email_err) && strlen($email) > 0) { echo 'valid'; } ?>" value="<?php echo $email; ?>">
					<span class="errorMessage"><?php echo $email_err; ?></span>

					<label for="password">Password: <span class="required">*</span></label>
					<input type="password" name="password" class="<?php if(!empty($password_err)) { echo 'invalid'; } if(empty($password_err) && strlen($password) > 0) { echo 'valid'; } ?>" value="<?php echo $password; ?>">
					<span class="errorMessage"><?php echo $password_err; ?></span>

					<div class="form-buttons">
						<input type="submit" name="submit" value="Login">
						<a href="signup.php">No account? Sign up here.</a>
					</div>
			</form>
			<div class="why-signup">
				<h3>Not Registered?</h3>
				<ul>
					<li><i class="fa fa-4x fa-rocket" aria-hidden="true"></i> Makes shopping faster</li>
					<li><i class="fa fa-4x fa-check" aria-hidden="true"></i> Can save items to Your cart</li>
					<li><i class="fa fa-4x fa-truck" aria-hidden="true"></i> Can track Your orders</li>
				</ul>
			</div>
		</div>
	</div>	

<?php include("inc/footer.php"); ?>