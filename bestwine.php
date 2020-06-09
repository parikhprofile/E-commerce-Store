<?php
require "connect_to_mysql.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<?php include_once("topheader.php");?>
	</head>
    <body>
		<?php include_once("hearder.php");?>
		<div id="wrapper" class="container">
			<?php include_once("subhearder.php");?>
			<section>
			<div class="row">
			<img src="images/pageBanner.png" width="100%" height="auto" >
				</div>
			</section>
			<section class="main-content">
				<div class="row">
				    <div class="col-md-12 col-xs-12">
					<h1 class="title">
									<center>Best Sellers</center>

								</h1>
								</div>
					<?php
											$sql = "SELECT ProductID,ProductThumb,ProductName,ProductPrice FROM products WHERE ProductCategoryID = 1 ";
$result = $conn->query($sql);


     // output data of each row
     while($row = $result->fetch_assoc()) {
		 $id = $row['ProductID'];
		 ?>

          <div class="col-sm-3 col-md-3 col-xs-12" id="product-info">
			<a href="product_detail.php?id=<?php echo $id ?> ">
			    <div class="product-image">
			<img name="myimage" align="middle" src=" <?php echo $row["ProductThumb"]?>" height="250px" alt="<?php echo $row["ProductName"]?>" />
			</div>
			<div class="product-title"><?php echo $row["ProductName"] ?></div>
			<div class="product-price">$<?php echo $row["ProductPrice"]?></div>
			</a>
			<button class="product-cart"><a href="cartAction.php?action=addToCart&id=<?php echo $id ?>" style="color:#ffffff">ADD TO CART</a></button>
			</div>
	 <?php }?>

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