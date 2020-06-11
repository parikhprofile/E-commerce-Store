<?php
// include database configuration file
include 'connect_to_mysql.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once("topheader.php");?>
		<script> $(document).ready(function(){ $("#sub").click(function(){
		  var customer_name = $("#name").val();
		  var customer_email = $("#email").val();
		  var customer_phone = $("#phone").val();
		  var customer_city = $("#city").val();
		  var customer_state = $("#state").val();
		  var customer_country = $("#country").val();
		  $.post("Checkout.php",{name:customer_name,email:customer_email,phone:customer_phone,city:customer_city,state:customer_state,country:customer_country},function(data){ $("#result").html(data); }); }); });
		  </script>

	</head>

    <body>
		<?php include_once("header.php");?>
		<div id="wrapper" class="container">
			<?php include_once("subheader.php");?>
			<section>
			<div class="row">
			<img src="images/pageBanner.png" width="100%" height="auto" >
				</div>
			</section>
			<section class="main-content">
			    <div class="row">
			<div class="col-md-12 col-xs-12">
					<h1 class="title">
									<center>Checkout</center>

								</h1>
								</div>
								 <div class="col-sm-2 col-xs-hidden col-md-2"></div>
								<div class="col-md-8 col-xs-12">
			<form role="form" method="POST" name="customerform" action="Checkout.php">
			<div class="row" id="checkout-form">
			        <div class="col-sm-6 col-xs-12 col-md-6" style="font-weight:bold"><span style="max-width:28px">Name:</span> <input type="text" id="name" name="name" placeholder=" Your Full Name"/></div>
			        <div class="col-sm-6 col-xs-12 col-md-6" style="font-weight:bold">Email: <input type="text" id="email" name="email" placeholder=" Email Address"/></div></div>
			        <div class="row" id="checkout-form">
			        <div class="col-sm-6 col-xs-12 col-md-6" style="font-weight:bold">Phone: <input type="text" id="phone" name="phone" placeholder=" Phone Number"/></div>
			        <div class="col-sm-6 col-xs-12 col-md-6" style="font-weight:bold">City: <input type="text" id="city" name="city" placeholder=" Your City"/></div></div>
			        <div class="row" id="checkout-form">
			        <div class="col-sm-6 col-xs-12 col-md-6" style="font-weight:bold">State: <input type="text" id="state" name="state" placeholder=" Your State"/></div>
			        <div class="col-sm-6 col-xs-12 col-md-6" style="font-weight:bold">Country: <input type="text" id="country" name="country" placeholder=" Your Country"/></div></div>

			<div class="col-sm-12 col-xs-12 col-md-12">
			<br><br>
			<center>
			<input type="submit" name="sub" id="sub" value="SUBMIT" class="product-cart" style="color:#ffffff"/></center>
			</div>
			</form>
			</div>
			<div class="col-sm-2 col-xs-hidden col-md-2"></div></div>

			<script> var frmvalidator = new Validator("customerform");
			frmvalidator.addValidation("name","req","Please provide your name");
			frmvalidator.addValidation("email","req","Please provide your email");
			frmvalidator.addValidation("email","email","Please enter a valid email address");
			frmvalidator.addValidation("phone","req","Please provide your phone");
			frmvalidator.addValidation("city","req","Please provide your city");
			frmvalidator.addValidation("state","req","Please provide your city");
			frmvalidator.addValidation("country","req","Please provide your country");
			</script>


			</section>
			<section id="footer-bar">
				<?php include_once("footer.php");?>
			</section>
			<section id="copyright">
			<?php include_once("subfooter.php");?>
			</section>
		</div>
		<script src="js/common.js"></script>
    </body>
</html>
