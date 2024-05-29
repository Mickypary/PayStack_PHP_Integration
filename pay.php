<?php

$amount = 1500;

// sanitize inputs from users

$sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);


// cOLLECT USERS INPUT
$first_name = $sanitizer['first_name'];
$last_name = $sanitizer['last_name'];
$phone = $sanitizer['phone'];
$email = $sanitizer['email'];
$product_name = "PHP Savvy";

// Check that all fields are filled in

if (empty($first_name) || empty($last_name) || empty($phone) || empty($email)) {
	header("Location: index.php?error");
}else {
	session_start();
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['phone'] = $phone;
	$_SESSION['email'] = $email;
	$_SESSION['product_name'] = $product_name;
	$_SESSION['amount'] = $amount;
}



?>





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
		<h2>Hi, <?= $email; ?></h2>

		<form id="paymentForm">
		  <div class="form-group">
		    <label for="email">Email Address</label>
		    <input type="email" id="email-address" required />
		  </div>
		  <div class="form-group">
		    <label for="amount">Amount</label>
		    <input type="tel" id="amount" required />
		  </div>
		  <div class="form-group">
		    <label for="first-name">First Name</label>
		    <input type="text" id="first-name" />
		  </div>
		  <div class="form-group">
		    <label for="last-name">Last Name</label>
		    <input type="text" id="last-name" />
		  </div>
		  <div class="form-group">
		    <label for="phone-number">Phone Number</label>
		    <input type="tel" id="phone-number" />
		  </div>
		  <div class="form-submit">
		    <button type="submit" onclick="payWithPaystack()"> Pay </button>
		  </div>
		</form>


		<script src="https://js.paystack.co/v1/inline.js"></script>

		<script type="text/javascript">
			const paymentForm = document.getElementById('paymentForm');
				paymentForm.addEventListener("submit", payWithPaystack, false);

				function payWithPaystack(e) {
				  e.preventDefault();

				  const api = "pk_test_38ce5dbc76015bcedfa961b13c7fd9512e3b2c96";

				  let handler = PaystackPop.setup({
				    // key: 'pk_test_38ce5dbc76015bcedfa961b13c7fd9512e3b2c96', // Replace with your public key
				    key: api, // Replace with your public key
				    email: document.getElementById("email-address").value,
				    phone: document.getElementById("phone-number").value,
				    // email: "<?= $email ?>",
				    // amount: document.getElementById("amount").value * 100,
				    amount: <?= $amount ?> * 100,
				    firstname: "<?= $first_name ?>",
				    lastname: "<?= $last_name ?>",
				    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
				    // label: "Optional string that replaces customer email"
				    onClose: function(){
				      alert('Window closed.');
				    },
				    callback: function(response){
				      let message = 'Payment complete! Reference: ' + response.reference;
				      // alert(message);
				      window.location.href = 'success.php?success_message='+message;
				    }
				  });

				  handler.openIframe();
				}

		</script>

	</div>
</body>
</html>


