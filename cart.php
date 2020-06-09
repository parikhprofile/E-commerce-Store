<?php
include 'Cart.php';
$cart = new Cart;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once("topheader.php");?>
		<script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
	</head>
    <body>
		<?php include_once("header.php");?>
		<div id="wrapper" class="container">
			<?php include_once("subheader.php");?>
			<section>
			<div class="row">
			<img src="images/pageBanner.png" width="100%"height="auto" >
				</div>
			</section>
			<section class="main-content">
                				<div class="row">
                				     <div class="col-md-12 col-xs-12">
					<h1 class="title">
									<center>Cart</center>

								</h1>
								</div></div>
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
            <td><?php echo $item["name"]; ?><br><a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" onclick="return confirm('Are you sure?')">Remove</a></td>
            <td>$<?php echo $item["price"]; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td>$<?php echo $item["subtotal"]; ?></td>

        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Your cart is empty.....</p></td></tr>
        <?php } ?>
    </tbody>
	<tr>
	<td colspan="4" align="right"> <?php if($cart->total_items() > 0){ ?>
            <strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong>
			</td></tr>
			<tr>
			<td colspan="2"><a href="index.php" class="btn btn-warning"> Continue Shopping</a></td>
			<td colspan="2" align="right"><a href="checkout.php" class="btn btn-success">Checkout</a></td>
			<?php } ?>
		</tr>
			</table>



				</div>
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