<?php
require "connect_to_mysql.php";
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

			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="images/banner-1.jpg" alt="" />
						</li>
						<li>
							<img src="images/banner-2.jpg" alt="" />

						</li>
					</ul>
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
											$sql = "SELECT ProductID,ProductThumb,ProductName,ProductPrice FROM products WHERE ProductCategoryID = 1  LIMIT 4";
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
			<section class="article" style="margin-top:25px">
			    <div class="row" style="background-color: darksalmon;">
			        <div class="col-md-4 col-xs-12" style="padding: 0px !important;">
			            <img src="images/banner.png" height="auto" width="100%"/>
			        </div>
			        <div class="col-md-4 col-xs-12" style="padding: 0px !important;">
			            <p id="quote">Wine is Always a Good Idea</p>
			        </div>
			        <div class="col-md-4 col-xs-hidden" style="padding: 0px !important;">
			            <img src="images/banner.png" height="auto" width="100%"/>
			        </div>
			    </div>
			</section>
			<section class="main-content">
				<div class="row">
				    <div class="col-md-12 col-xs-12">
					<h1 class="title">
									<center>Top Sellers</center>

								</h1>
								</div>
									<?php
											$sql = "SELECT ProductID,ProductThumb,ProductName,ProductPrice FROM products WHERE ProductCategoryID = 2  LIMIT 4";
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
			<section>
			    <div class="row" id="article-footer">
			        <div>We Offer Free Shipping on Order Over $45</div>
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
		<script src="js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>