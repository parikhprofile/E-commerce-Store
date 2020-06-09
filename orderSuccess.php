<?php
// include database configuration file
include 'connect_to_mysql.php';



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>WineStore</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="css/bootstrap1.min.css" rel="stylesheet">

		<link href="css/bootstrappage.css" rel="stylesheet"/>

		<!-- global styles -->
		<link href="css/flexslider.css" rel="stylesheet"/>
		<link href="css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.scrolltotop.js"></script>
		<script src="js/gen_validatorv31.js"></script>

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		 <link rel="shortcut icon" href="../assets/images/favicon.ico">

	</head>

    <body>
		<?php include_once("hearder.php");?>
		<div id="wrapper" class="container">
			<?php include_once("subhearder.php");?>
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