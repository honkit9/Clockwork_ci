
	<html>

	<head>
		<!-- Basic -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!-- Site Metas -->
		<link rel="icon" href="images/fevicon.png" type="image/gif" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Room_detail</title>


		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.css">
		<!-- fonts style -->
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
		<!-- font style--awesome -->
		<link href="<?=base_url().'assets/css/font-awesome.min.css'?>" rel="stylesheet" />

		<!-- Custom styles  -->
		<link href="<?=base_url().'assets/css/style.css'?>" rel="stylesheet" />
		<!-- responsive style -->
		<link href="<?=base_url().'assets/css/responsive.css'?>" rel="stylesheet" />

	</head>

	<body>

	<!-- header section strats -->
	<header class="header_section">
		<div class="container">
			<nav class="navbar navbar-expand-lg custom_nav-container ">
				<div class="navbar-brand">
					<span>Lucifer Hotel</span>
				</div>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class=""> </span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav  ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?= base_url().'customer/home/'?>">Home <span class="sr-only">(current)</span></a>
						</li>
<!--						<li class="nav-item">-->
<!--							<a class="nav-link" href="ROOM.php"> Room</a>-->
<!--						</li>-->
<!--						<li class="nav-item">-->
<!--							<a class="nav-link" href="Profile.php">Profile&Booking </a>-->
<!--						</li>-->
<!--						<li class="nav-item">-->
<!--							<a class="nav-link" href="About Us.php">About US</a>-->
<!--						</li>-->
<!--						<li class="nav-item">-->
<!--							<a class="nav-link" href="Feedback.php">Feedback</a>-->
<!--						</li>-->
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url().'customer/home/logout'?>">Logout</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- end header section -->

	<!-- about section -->

	<section class="blog_section layout_padding">
		<form name="roomdetailfrm" method="post" action="">
			<div class="container">
				<div class="heading_container">
					<h2>
						Book Time
					</h2>
				</div>

				<?php
				if(isset($room_row))
				{
				$imgurl = base_url().$room_row[0]['Room_Image'];

				?>


				<div class="row">
					<div class="col-md-6">
						<div class="box">
							<div class="img-box">
								<?php echo "<img src='$imgurl' style='width: 100%'>"; ?>
								<h4 class="blog_date">
									RM<?php echo $room_row[0]["Room_Price"]; ?> <br>
									per night
								</h4>
							</div>
							<div class="detail-box">
								<h5>
									<?php echo $room_row[0]["Room_Name"]; ?>
								</h5>
								<p>
									Summary: <?php echo $room_row[0]["Room_Summary"]; ?>
								</p>
								<p>Recommendation: <?php echo $room_row[0]["Recommendation"]; ?></p>
								<p>**Price include SST charge and breakfast**</p>
<!--								<p>Check In  :   <input type="date" name="checkin" min=--><?php //echo $checkin1;?><!-- max=--><?php //echo date_format($checkin2,"Y-m-d");?><!-- required /></p>-->
<!--								<p>Check Out :   <input type="date" name="checkout" min=--><?php //echo $checkin1;?><!-- max=--><?php //echo date_format($checkin2,"Y-m-d");?><!-- required /></p>-->
								<input type="submit" name="bookbtn" value="Book Now"/>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
		</form>
	</section>
	<!-- end about section -->

	<!-- info section -->

	<!--  <section class="info_section ">-->
	<!--    <div class="info_container ">-->
	<!--      <div class="container"> -->
	<!--        <div class="info_logo">-->
	<!--        <div class="navbar-brand">-->
	<!--          <span>Lucifer Hotel</span>-->
	<!--        </div>-->
	<!--        </div>-->
	<!--      </div>-->
	<!--    </div>-->
	<!--  </section>-->

	<!-- end info section -->

	<!-- footer section -->
	<!--  <footer class="footer_section">-->
	<!--    <div class="container">-->
	<!--      <p>-->
	<!--       Lucifer Hotel © 2014-2020 . All rights reserved-->
	<!--      </p>-->
	<!--    </div>-->
	<!--  </footer>-->
	<!-- footer section -->

	<!-- jQery -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.js"></script>
	<!-- custom js -->
	<script src="js/custom.js"></script>

	</body>

	</html>


<?php

if(isset($_POST["bookbtn"]))
{
	if($room_row["Room_Stock"] != 0)
	{
		$checkin = $_POST["checkin"];
		$checkout = $_POST["checkout"];
		$date1 = strtotime($checkin);
		$date2 = strtotime($checkout);
		$night = abs($date1- $date2)/60/60/24;

		$total = $night * $room_row["Room_Price"];

		if($checkin < $checkout)
		{
			$room = $room_row['Room_ID'];
			session_start();
			$_SESSION["checkin"] = $checkin;      // Next to Booking Cart and Payment
			$_SESSION["checkout"] = $checkout;
			$_SESSION["Night"] = $night;
			$_SESSION["Total_Price"] = $total;
			header( "refresh:0.5; url=Booking Cart.php?room=$room");
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Please choose again date");
			</script>

			<?php
		}
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("This room is book finish. Please choice another room.");
		</script>

		<?php
	}

}

?>
