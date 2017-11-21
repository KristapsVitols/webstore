<?php
include("inc/header.php");

if(!isset($_SESSION['email'])) {
	header("Location: index.php");
}

?>

<div class="container profile-container">
	<h2>Profile</h2>
	<hr class="bottom-border">
		<?php if(isset($user)): ?>
			<div class="top-section">
				<img src="assets/images/profile-picture.png" alt="Profile picture">
				<ul>
					<li>Name: <?php echo $user->getFirstName(); ?></li>
					<li>Lastname: <?php echo $user->getLastName(); ?></li>
					<li>Email: <?php echo $user->getEmail(); ?></li>
					<li>Phone: <?php echo $user->getPhone(); ?></li>
				</ul>
			</div>
			<div class="bottom-section">
				<h3>Orders</h3>
				<table>
					<tr>
						<th>Order ID:</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Order Date</th>
						<th>Status</th>
					</tr>
					<tr>
						<td>3231</td>
						<td>Samsung SyncMaster</td>
						<td>235$</td>
						<td>2017-02-15</td>
						<td>Shipped out</td>
					</tr>
					<tr>
						<td>3231</td>
						<td>Samsung SyncMaster</td>
						<td>235$</td>
						<td>2017-02-15</td>
						<td>Shipped out</td>
					</tr>
				</table>
			</div>
		<?php endif; ?>
</div>	

<?php include("inc/footer.php"); ?>
