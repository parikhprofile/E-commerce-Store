<?php
require "connect_to_mysql.php";
$id=$_GET['id'];


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
			<img src="images/pageBanner.png" width="100%" height="auto">
				</div>
			</section>
			<section class="main-content">
				<div class="row">
				 <div class="col-md-12 col-xs-12">
					<h1 class="title">
									<center>Product Details</center>

								</h1>
								</div>
				<?php
				$sql = "SELECT ProductName,ProductPrice,ProductLongDesc,ProductThumb FROM products WHERE ProductID = '$id' ";
$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {
 ?>

					<div class="col-sm-6 col-xs-12 col-md-6">
					<center>
					<img name="myimage" align="middle" src="<?php echo $row[ProductThumb]?>" height="350px" alt="<?php echo $row[ProductName]?>" />
					</center>
					</div>
					<div class="col-sm-5 col-xs-12 col-md-5">
					<h3><?php echo $row[ProductName] ?></h3>
					<h4>Price: $<?php echo $row[ProductPrice] ?></h4>
					<h5 style="line-height:18px"><?php echo $row[ProductLongDesc]?></h5>
					  <button class="product-cart"><a href="cartAction.php?action=addToCart&id=<?php echo $id ?>" style="color:#ffffff">ADD TO CART</a></button>
					<?php }?>
					</div>
					<div class="col-sm-2 col-xs-hidden col-md-2"></div>

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
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});

				$('#myCarousel-2').carousel({
                    interval: 2500
                });
			});
		</script>
    </body>
</html>