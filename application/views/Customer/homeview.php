
<html>

<head>
	<!-- Beginning of the code-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Mobile style -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<!-- Site -->
	<link rel="icon" href="images/fevicon.png" type="image/gif" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>Home</title>


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

<!-- The header of the layout-->
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
<!--					<li class="nav-item">-->
<!--						<a class="nav-link" href="ROOM.php"> Room</a>-->
<!--					</li>-->
<!--					<li class="nav-item">-->
<!--						<a class="nav-link" href="Profile.php">Profile&Booking </a>-->
<!--					</li>-->
<!--					<li class="nav-item">-->
<!--						<a class="nav-link" href="About Us.php">About US</a>-->
<!--					</li>-->
<!--					<li class="nav-item">-->
<!--						<a class="nav-link" href="Feedback.php">Feedback</a>-->
<!--					</li>-->
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url().'customer/home/logout'?>">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
<!-- end of the header section -->
<!-- The slider section -->
<section class="slider_section ">
	<div id="customCarousel1" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="container ">
					<div class="row">
						<div class="col-md-6 col-lg-5">
							<div class="detail-box">
								<h1>
									Looking for 5 STAR Hotel <br>
									It is the good choice for chosing us.
								</h1>
								<p>
									Our hotel giving the best hospitality service ever to target our quality of the service and with the correct manner. </p>
							</div>
						</div>
						<div class="col-md-6 col-lg-7">
							<div class="img-box">
								<img src="<?=base_url().'images/Hotel1.jpg'?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="container ">
					<div class="row">
						<div class="col-md-6 col-lg-5">
							<div class="detail-box">
								<h1>
									Our hotel<br>
									Maintain the good quality of the design and appearance of hygience.
								</h1>
								<p>
									Chosing us were the best cchoice for a relax and enjoy holiday. </p>
							</div>
						</div>
						<div class="col-md-6 col-lg-7">
							<div class="img-box">
								<img src="<?=base_url().'images/suite2.jpg'?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="container ">
					<div class="row">
						<div class="col-md-6 col-lg-5">
							<div class="detail-box">
								<h1>
									Booking Now <br>
									Book the room that suite for you
								</h1>
								<p>
									A good hotel will let customer feel the enjoy and relax in the contain of quality of services with a budget.</p>
							</div>
						</div>
						<div class="col-md-6 col-lg-7">
							<div class="img-box">
								<img src="<?=base_url().'images/queen2.jpg'?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<ol class="carousel-indicators">
			<li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
			<li data-target="#customCarousel1" data-slide-to="1"></li>
			<li data-target="#customCarousel1" data-slide-to="2"></li>
		</ol>
	</div>
</section>
<!-- end of slider section -->

<!-- Hotel picture offer section -->

<section class="offer_section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7 px-0">
				<div class="box offer-box1">
					<img src="<?=base_url().'images/Hotel2.jpg'?>" alt="">
				</div>
			</div>
			<div class="col-md-5 px-0">
				<div class="box offer-box2">
					<img src="<?=base_url().'images/Hotel3.jpg'?>" alt="">
				</div>
				<div class="box offer-box3">
					<img src="<?=base_url().'images/Hotel4.jpg'?>" alt="">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- end picture offer section -->

<!-- Rooms(product) section -->

<section class="product_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>
				Our Room
			</h2>
			<p>
				Giving you the top attractions rooms and halls.
			</p>
		</div>
		<div class="row">

			<?php

			$j=0; //using $ to get the variable


			foreach($rooms as $res)//mysqli_fetch_assoc-->used to return an array
			{
				$imgurl = base_url().$res['Room_Image'];
				if($j < 6)
				{
					?>
					<div class="col-sm-6 col-lg-4">
						<div class="box">
							<div class="img-box">
								<?php echo "<img src='$imgurl' style='width: 100%'>"; ?>
							</div>
							<div class="detail-box">
              <span class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star "></span>
              </span>
								<a href=<?= base_url().'customer/home/checkroom/'.$res['Room_ID']?> class="link-primary">
									<?php echo $res["Room_Name"]; ?>
								</a>
								<div class="price_box">
									<h6 class="price_heading">
										<span>RM</span> <?php echo $res["Room_Price"]; ?>.00 per night
									</h6>
								</div>
							</div>
						</div>
					</div>
					<?php
					$j++;//increase
				}
			}
			?>
		</div>
		<div class="btn-box">
			<a href="ROOM.php">
				View All
			</a>
		</div>
	</div>
</section>

<!-- end rooms(product) section -->

<!-- about hotel section -->

<section class="about_section layout_padding">
	<div class="container  ">
		<div class="row">
			<div class="col-md-6 ">
				<div class="img-box">
					<img src="<?=base_url().'images/hotel.jpg'?>" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="detail-box">
					<div class="heading_container">
						<h2>
							Lucifer Hotel
						</h2>
					</div>
					<p>Lucifer Hotel is one of the 5 Star Hotel that let you enjoy the luxury with a minimum spend.It also one of the budget hotel that can enjoy by all of us.
					</p>
					<p>The design that been designed are all aligned with 5 Star Quaity</p>
					<p>It is recommended for those who want to have a relax and enjoy holiday.An enjoy holiday it starts from us. Have a nice day!</p>
					<a href="#">
						About Us
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- end about hotel section -->

<!-- blog info section -->

<!--<section class="blog_section layout_padding">-->
<!--	<div class="container">-->
<!--		<div class="heading_container">-->
<!--			<h2>-->
<!--				Hotel Facilities-->
<!--			</h2>-->
<!--		</div>-->
<!--		<div class="row">-->
<!--			<div class="col-md-6">-->
<!--				<div class="box">-->
<!--					<div class="img-box">-->
<!--						<img src="images/gym.jpg" alt="">-->
<!--						<h4 class="blog_date">-->
<!--							Lucifer Hotel <br>-->
<!--							GYM-->
<!--						</h4>-->
<!--					</div>-->
<!--					<div class="detail-box">-->
<!--						<h5>-->
<!--							Gym that provided in our hotel will statisfy your requirements.-->
<!--						</h5>-->
<!--						<p>-->
<!--							Our gym located at our high level therefore our guests can see our city scenery while for the back is forest scenery.-->
<!--						</p>-->
<!--						<p>**Business hour: 8am to 10pm**</p>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-md-6">-->
<!--				<div class="box">-->
<!--					<div class="img-box">-->
<!--						<img src="images/playground.jpg" alt="">-->
<!--						<h4 class="blog_date">-->
<!--							Lucifer Hotel <br>-->
<!--							Playground-->
<!--						</h4>-->
<!--					</div>-->
<!--					<div class="detail-box">-->
<!--						<h5>-->
<!--							OUR NEW OPENING !!!!!!-->
<!--						</h5>-->
<!--						<p>-->
<!--							Our hotel provided Indoor Pool Playground that let our kids happy and jolly-->
<!--						</p><br>-->
<!--						<p>**Business hour: 8am to 8pm**</p><br>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->

<!-- end blog info section -->

<!-- client section -->
<!--<section class="client_section ">-->
<!--	<div class="container">-->
<!--		<div class="heading_container heading_center">-->
<!--			<h2>-->
<!--				Customer's review-->
<!--			</h2>-->
<!--			<p>-->
<!--				Our customer's review for our hotel quality.-->
<!--			</p>-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!--</section>-->
<!-- end client section -->



<!-- info section -->

<section class="info_section ">
	<div class="info_container ">
		<div class="container">
			<div class="info_logo">
				<div class="navbar-brand">
            <span>
              Lucifer Hotel
            </span>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- end info section -->

<!-- hotel footer section -->
<footer class="footer_section">
	<div class="container">
		<p>
			Lucifer Hotel © 2014-2020 . All rights reserved
		</p>
	</div>
</footer>
<!-- end of footer section -->

<!-- jQery -->
<script src="<?=base_url().'assets/js/jquery-3.4.1.min.js'?>"></script>
<!-- bootstrap js -->
<script src="<?=base_url().'assets/js/bootstrap.js'?>"></script>
<!-- custom js -->
<script src="<?=base_url().'assets/js/custom.js'?>"></script>

</body>

</html>
