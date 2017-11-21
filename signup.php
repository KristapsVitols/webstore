<?php
include("inc/header.php");

//Init variables
$fname = $lname = $email = $phone = $password = $confirm_password = '';

$fname_err = $lname_err = $email_err = $phone_err = $password_err = $confirm_password_err = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	//Remove spaces and stuff
	$fname = trim($_POST['fname']);
	$fname = ucwords($fname);
	$lname = trim($_POST['lname']);
	$lname = ucwords($lname);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);


	//Validate First Name
	if(empty($fname)) {
		$fname_err = "Please enter first name";
	}

	//Validate Last Name
	if(empty($lname)) {
		$lname_err = "Please enter last name";
	}

	//Validate Email
	if(empty($email)) {
		$email_err = "Please enter an email";
	} elseif($account->validateEmail($email)) {
		$email_err = 'Email already taken';
	}

	//Validate Phone
	if(empty($phone)) {
		$phone_err = "Please enter a phone number";
	}

	//Validate Password
	if(empty($password)) {
		$password_err = "Please enter a password";
	} elseif(strlen($password) < 6) {
		$password_err = "Password must be at least 6 characters";
	}	

	//Validate confirm password
	if(empty($confirm_password)) {
		$confirm_password_err = "Please confirm password";
	} elseif($password != $confirm_password) {
		$confirm_password_err = "Passwords not matching";
	}

	if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

		//Hash password
		$password = password_hash($password, PASSWORD_DEFAULT);
		//Register the user
		$account->register($fname, $lname, $email, $phone, $password);
	}
}

?>

	<div class="container signup-container">
		<h2>Sign Up</h2>
		<hr class="bottom-border">
		<div class="inner-container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' class="signup-form">
					<label for="fname">Firstname: <span class="required">*</span></label>
					<input type="text" name="fname" class="<?php if(!empty($fname_err)) { echo 'invalid'; } if(empty($fname_err) && strlen($fname) > 0) { echo 'valid'; } ?>" value="<?php echo $fname; ?>">
					<span class="errorMessage"><?php echo $fname_err; ?></span>

					<label for="fname">Lastname: <span class="required">*</span></label>
					<input type="text" name="lname" class="<?php if(!empty($lname_err)) { echo 'invalid'; } if(empty($lname_err) && strlen($lname) > 0) { echo 'valid'; } ?>" value="<?php echo $lname; ?>">
					<span class="errorMessage"><?php echo $lname_err; ?></span>

					<label for="email">Email: <span class="required">*</span></label>
					<input type="email" name="email" class="<?php if(!empty($email_err)) { echo 'invalid'; } if(empty($email_err) && strlen($email) > 0) { echo 'valid'; } ?>" value="<?php echo $email; ?>">
					<span class="errorMessage"><?php echo $email_err; ?></span>

					<label for="phone">Phone: <span class="required">*</span></label>
					<input type="text" name="phone" class="<?php if(!empty($phone_err)) { echo 'invalid'; } if(empty($phone_err) && strlen($phone) > 0) { echo 'valid'; } ?>" value="<?php echo $phone; ?>">
					<span class="errorMessage"><?php echo $phone_err; ?></span>

					<label for="password">Password: <span class="required">*</span></label>
					<input type="password" name="password" class="<?php if(!empty($password_err)) { echo 'invalid'; } if(empty($password_err) && strlen($password) > 0) { echo 'valid'; } ?>" value="<?php echo $password; ?>">
					<span class="errorMessage"><?php echo $password_err; ?></span>

					<label for="confirm_password">Confirm Password: <span class="required">*</span></label>
					<input type="password" name="confirm_password" class="<?php if(!empty($confirm_password_err)) { echo 'invalid'; } if(empty($confirm_password_err) && strlen($confirm_password) > 0) { echo 'valid'; } ?>" value="<?php echo $confirm_password; ?>">
					<span class="errorMessage"><?php echo $confirm_password_err; ?></span>

					<div class="form-buttons">
						<input type="submit" name="submit" value="Sign up">
						<a href="login.php">Already have an account? Login here.</a>
					</div>
			</form>
			<div class="why-signup">
				<h3>Why Sign Up?</h3>
				<ul>
					<li><i class="fa fa-4x fa-rocket" aria-hidden="true"></i> Makes shopping faster</li>
					<li><i class="fa fa-4x fa-check" aria-hidden="true"></i> Can save items to Your cart</li>
					<li><i class="fa fa-4x fa-truck" aria-hidden="true"></i> Can track Your orders</li>
				</ul>
			</div>
		</div>
	</div>	

<?php include("inc/footer.php"); ?>