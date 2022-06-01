<!DOCTYPE html>

<head>
	<!-- meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Travel Now</title>

	<link rel="stylesheet" href="Views/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="Views/assets/css/ionicons.min.css">
	<link rel="stylesheet" href="Views/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="Views/assets/css/owl.theme.css">
	<link rel="stylesheet" href="Views/assets/css/flexslider.css" type="text/css">
	<link rel="stylesheet" href="Views/assets/css/main.css?">
	<link rel="stylesheet" href="Views/assets/css/contact.css">

	<style type="text/css">
		table {
			border-radius: 10px;
			border-collapse: collapse;
			width: 100%;
			background-color: #e4e7e7;
			width: 90%;
			border: 2px, solid, black;

		}

		th,
		td {
			border: 2px, solid, black;
			text-align: left;
			padding: 14px;
			color: black;
		}


		th {
			background-color: rgb(154, 154, 184);
			color: white;
		}
	</style>


</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color: white;">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#header" title="HOME"><i class="ion-paper-airplane"></i> travel
					<span>now</span></a>
			</div> <!-- /.navbar-header -->

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#header">Home</a></li>
					<li><a href="#search">Find a Tour</a></li>
					<?php session_start(); if(!isset($_SESSION['type'])){ ?>
						<li><a href="#loginSection">Login</a></li>
					<?php } else { ?>
						<li><a href="Views/profile.php">My account</a></li>
					<?php } ?>
					<li><a href="#contact">Contact Us</a></li>
				</ul> <!-- /.nav -->
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>

	<!-- Home -->
	<section id="header">
		<div class="flexslider">
			<ul class="slides">
				<li class="slider-item" >
					<div class="intro container">
						<div class="inner-intro">
							<h1 class="header-title">
								<span>traveling</span> always "good idea"
							</h1>
							<p class="header-sub-title">
								it leaves you speecless, then turns your into a storyteller.
							</p>
							<a href="#search" class="btn custom-btn">
								book now
							</a>
						</div>
					</div>
				</li> <!-- /.slider-item -->
				<li class="slider-item" >
					<div class="intro">
						<div class="inner-intro">
							<h1 class="header-title">
								to <span>travel</span> is to <span>live</span>
							</h1>
							<p class="header-sub-title">
								it leaves you speecless, then turns your into a storyteller.
							</p>
							<a href="#search" class="btn custom-btn">
								book now
							</a>
						</div>
					</div>
				</li> <!-- /.slider-item -->
			</ul> <!-- /.slides -->
		</div> <!-- /.flexslider -->
	</section> <!-- /#header -->
	<!-- Find a Tour -->
	<section id="search" class="tour section-wrapper container">
		<h2 class="section-title">
			Find a Tour
		</h2>
		<p class="section-subtitle">
			Where would you like to go?
		</p>
		<div class="row">
			<form id="searchForm" method="POST" action="Controllers/Voyage.php">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label style="color: black;">Select the start city:</label>
						<select name="ville_depart" class="form-control border-radius" id="sel1">
							<option selected disabled>Start City</option>
							<option value="Safi">Safi</option>
							<option value="Casablanca">Casablanca</option>
							<option value="Marrakech">Marrakech</option>
							<option value="Rabat">Rabat</option>
						</select>

					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label style="color: black;">Select the arrival city:</label>
						<select name="ville_arrivee" class="form-control border-radius" id="sel1">
							<option selected disabled>Arrival city</option>
							<option value="Safi">Safi</option>
							<option value="Casablanca">Casablanca</option>
							<option value="Marrakech">Marrakech</option>
							<option value="Rabat">Rabat</option>
						</select>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<label style="color: black;">Select the start date</label>
					<div class="input-group">
						<input name="ddepart" type="date" min="<?php echo date('Y-m-d') ?>" class="form-control border-radius border-right" placeholder="Start Date" />
						<span class="input-group-addon border-radius custom-addon"></span>
					</div>
				</div>


				<input type="submit" name="search" class="btn btn-default border-radius custom-button" value="Search">

			</form>
		</div>
	</section> <!-- /.tour -->



	<section id="result">

		<center>

			<table style="width: 70%;" id="mytable">
				<thead>
					<tr>
						<th>Start City</th>
						<th>Arrival City</th>
						<th>Start Date</th>
						<th>Arrival Date</th>
						<th>Places left</th>
						<th>Price</th>
						<th>Book</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</center>

	</section>


<?php if(!isset($_SESSION['user'])){?>

	<section class="section-wrapper contact-and-map" id="loginSection">
		<div class="d-grid gap-2 col-4 container">

			<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

				<div class="btn-group mr-2" role="group" aria-label="First group">
					<button onclick="togglee()" class="btn btn-default border-radius custom-button">Create an account
					</button>
				</div>
				<div class="btn-group mr-2" role="group" aria-label="Second group">
					<button onclick="togglee()" class="btn btn-default border-radius custom-button">Login </button>
				</div>
			</div>

		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6" id="new">
					<h2 class="section-title">
						Become a client
					</h2>
					<form id="inscriptionForm" class="form" method="post" action="Controllers/Accounts.php">
						<div class="input-group">
							<input name="last_name" class="form-control border-radius border-right" type="text" placeholder="Last Name" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" name="first_name" type="text" placeholder="First Name" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" name="cin" type="text" placeholder="CIN" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" type="text" name="username" placeholder="Username" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" type="email" placeholder="E-mail" name="email" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-email"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" type="password" name="pass" placeholder="Password" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" type="tel" placeholder="Telephone" name="Phone" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-telephone"></i>
							</span>
						</div>
						<button type="submit" name="register" class="btn btn-default border-radius custom-button">Create an account
						</button>
					</form>
				</div> <!-- /.col-sm-6 -->


				<div class="col-sm-6" id="conn" hidden>
					<h2 class="section-title">
						Login
					</h2>
					<form id="ConnexionForm" class="form" action="Controllers/Accounts.php" method="post">
						<div class="input-group">
							<input class="form-control border-radius border-right" type="text" placeholder="Username" name="username" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
						<div class="input-group">
							<input class="form-control border-radius border-right" name="pass" type="password" placeholder="Password" required>
							<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>

						<button type="submit" name="login" class="btn btn-default border-radius custom-button">Login</button>
					</form>
				</div> <!-- /.col-sm-6 -->
			</div>
		</div>
	</section>

	<?php } ?>

	<section class="subscribe section-wrapper" id="contact">
		<div class="alert alert-success" id="alert" hidden>
			<strong>Success!</strong> Message has successfuly sent.
		</div>
		<div class="brand-logo"><i class="ion-paper-airplane"></i>Contact Us</div>
		<p class="subscribe-now">
			Leave us a message
		</p>
		<div class="container">
			<form id="messageForm">
				<div class="form-group">
					<label for="exampleInputEmail1">Enter your email</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="E-mail">
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Enter your message</label>
					<textarea class="form-control" name="message" placeholder="Message" id="exampleFormControlTextarea1" rows="4"></textarea>
				</div>
				<button type="submit" class="btn btn-primary d-flex justify-content-center m-auto">Send</button>
			</form>
		</div>


		<ul class="social-icon">
			<li><a href="#"><i class="ion-social-twitter"></i></a></li>
			<li><a href="#"><i class="ion-social-facebook"></i></a></li>
			<li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
			<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
		</ul>
	</section> <!-- /.subscribe -->






	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-4">
					<div class="text-left">
						&copy; Meryam Lebdaoui Travels
					</div>
				</div>
				<div class="col-xs-4">
					Travel Now
				</div>
				<div class="col-xs-4">
					<div class="top">
						<a href="#header">
							<i class="ion-arrow-up-b"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<script src="Views/assets/js/jquery-1.11.2.min.js"></script>
	<script src="Views/assets/js/bootstrap.min.js"></script>
	<script src="Views/assets/js/owl.carousel.min.js"></script>
	<script src="Views/assets/js/contact.js"></script>
	<script src="Views/assets/js/jquery.flexslider.js"></script>
	<script src="Views/assets/js/script.js"></script>

	<script>
		function togglee() {
			$('#new').toggle();
			$('#conn').toggle();
		}
		$(document).ready(function() {
			clearTable();
		})

		function clearTable() {
			$('#mytable tbody').empty();
			$('#mytable').hide();
		}


		$('#messageForm').on('submit', function(e) {
			e.preventDefault();
			var data = $('#messageForm').serializeArray();
			data.push({
				name: 'messageB',
				value: 'hello'
			});
			$.ajax({
				url: "Controllers/Messages.php",
				type: 'POST',
				data: data,
				success: function(res) {
					$('#alert').show();
					setTimeout("$('#alert').hide();", 4000);
					$('#messageForm').trigger('reset');
				},
				error: function() {

				}
			})
		});


		$('#searchForm').on('submit', function(e) {
			clearTable();
			e.preventDefault();
			var formData = $('#searchForm').serializeArray();
			formData.push({
				name: 'search',
				value: 'hello'
			});
			console.log(formData);
			$.ajax({
				url: "Controllers/Voyage.php",
				type: 'POST',
				data: formData,
				success: function(res) {
					$('#mytable').show();
					console.log(res);
					var myJsonString = JSON.parse(res)
					console.log(myJsonString.length);
					console.log(myJsonString);
					console.log(myJsonString[0]['date_arrive']);
					for (var i = 0; i < myJsonString.length; i++) {

						$('#mytable tbody').eq(0).append("<tr>");
						$('#mytable tbody').eq(0).append("<td>" + myJsonString[i]['ville_depart'] + "</td>");
						$('#mytable tbody').eq(0).append("<td>" + myJsonString[i]['ville_arrive'] + "</td>");
						$('#mytable tbody').eq(0).append("<td>" + myJsonString[i]['date_depart'] + "</td>");
						$('#mytable tbody').eq(0).append("<td>" + myJsonString[i]['date_arrive'] + "</td>");
						$('#mytable tbody').eq(0).append("<td>" + myJsonString[i]['nb_place'] + "</td>");
						$('#mytable tbody').eq(0).append("<td>" + myJsonString[i]['prix'] + "</td>");
						$('#mytable tbody').eq(0).append("<td><a href=\"Controllers/Voyage.php?id=" + myJsonString[i]['id'] + "\" class=\"btn btn-primary\">Book</a></td>");
						$('#mytable tbody').eq(0).append("</tr>");
					}
				},
				error: function() {
					console.log("error");
				}
			})
		});
	</script>






</body>

</html>