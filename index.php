<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paystack Payment Integration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="container">
		<img src="">
		<small>PHP Savvy</small>
		<small>Price: N1,500</small>

		<form method="POST" action="pay.php">
			<label>First Name</label>
			<input type="text" name="first_name" placeholder="First Name">
			<label>Last Name</label>
			<input type="text" name="last_name" placeholder="Last Name">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email Address">
			<label>Phone Number</label>
			<input type="tel" name="phone" placeholder="Phone Number">

			<button name="buy">Submit</button>
		</form>
	</div>
</body>
</html>


