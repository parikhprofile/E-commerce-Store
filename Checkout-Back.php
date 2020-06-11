<?php
// include database configuration file
include 'connect_to_mysql.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];


	$insert = "insert into customers (name,email,phone,city,state,country,created, modified) values ('$name', '$email','$phone','$city','$state','$country','".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	$result = $conn->query($insert);
   
	
	   

// initializ shopping cart class
include 'Cart-back.php';
$cart = new Cart;


	
// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include_once("topheader.php");?>
		  
		 
	</head>
	
    <body>		
		<?php include_once("header.php");?>
		<div id="wrapper" class="container">
			<?php include_once("subheader.php");?>				
			<section>
			<div class="row">
			<div class="col-sm-12 col-xs-12 col-md-12">
			<img src="images/pageBanner.png" width="100%"height="auto">
				<center><strong><h4 style="color:#eb4800;font-weight:800">ORDER REVIEW</h4></strong></center>
				</div></div>
			</section>	
			<section class="main-content">
			<div class="row">
				<div class="table-responsive">
					<table class="table">
							<thead>
								<tr>
			<th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
							 <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td>$<?php echo $item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td>$<?php echo $item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
        </tr>
</tbody>
</table></div></div>
<div class="shipAddr">
        <h4>Shipping Details</h4>
		
        <p><?php echo $name; ?></p>
        <p><?php echo $email; ?></p>
        <p><?php echo $phone; ?></p>
        <p><?php echo $city; ?></p>
        <p><?php echo $state; ?></p>
        <p><?php echo $country; ?></p>
		
    </div>
<div class="footBtn">
     
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></a><br><br></div>
 						
					</div>
				
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