<?php
// include database configuration file
include 'connect_to_mysql.php';



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
			<img src="images/pageBanner.png" width="100%"height="auto">
				</div>
			</section>
			<section class="main-content">
			<div class="row">
			    <div class="col-md-12 col-xs-12">
					<h1 class="title">
									<center>Order Status</center>

								</h1>
								</div>
			<center>
			<div class="col-sm-12 col-xs-12 col-md-12" style="font-size:14px;">
			<?php
			$sql = "SELECT * FROM orders  ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);


     $row = $result->fetch_assoc();
		 $id = $row['id'];
         echo '<p>Your order has submitted Successfully. Order ID:<strong>'. $id .'</strong></p>';

			?>

			</div>
			</center>
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