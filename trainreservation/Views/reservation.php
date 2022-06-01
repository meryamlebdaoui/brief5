<?php

if(!isset($_GET['id'])){
    header('Location: ../index.php');
}

session_start();
if ($_SESSION['type'] == 'Client') {
    require_once "../Models/Client.php";
    $user = unserialize($_SESSION['user']);
}

require_once "../Models/Voyage.php";
$voyage = Voyage::getOne($_GET['id']);

?>

<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->

<head>
    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Travel Now</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/section.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

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
                <a class="navbar-brand" href="../index.php" title="HOME"><i class="ion-paper-airplane"></i> travel
                    <span>now</span></a>
            </div> <!-- /.navbar-header -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li id="BHome"><a href="../index.php">Home</a></li>
                    <li id="BSearch"><a href="../index.php">Find a tour</a></li>
                    <?php if(!isset($_SESSION['type'])){ ?>
						<li><a href="../index.php">Login</a></li>
					<?php } else { ?>
						<li><a href="profile.php">My account</a></li>
					<?php } ?>
                    <li><a href="../index.php">Contact Us</a></li>
                </ul> <!-- /.nav -->
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

    <!-- Section Background -->
    <section class="section-background">
        <div class="container">
            <h2 class="page-header">

            </h2>
            <ol class="breadcrumb">
                <li><a href="../index.php">Reservations</a></li>
                <li class="active">&nbsp;New booking</li>
            </ol>
        </div> <!-- /.container -->
    </section> <!-- /.section-background -->


    <section class="section-wrapper contact-and-map">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="section-title">
                        Book a travel
                    </h2>
                    <form class="form" method="POST" action="../Controllers/Reservation.php">
                        <div class="input-group">
                            <input class="form-control border-radius border-right" <?php if (isset($user)) echo "value=\"" . $user->first_name . "\" readonly" ?> type="text" placeholder="First Name" name="first_name" required>
                            <span class="input-group-addon  border-radius custom-addon">
                                <i class="ion-person"></i>
                            </span>
                        </div>


                        <input value="<?php echo $voyage->id; ?>" type="text" name="idVoyage" hidden>
                        <input class="price" value="<?php echo $voyage->prix; ?>" type="text" name="prix" hidden>

                        <?php
                        if (isset($user)) {
                            echo "<input value=\"" . $user->id . "\" type=\"text\" name=\"idUser\" hidden>";
                        }
                        ?>

                        <div class="input-group">
                            <input class="form-control border-radius border-right" <?php if (isset($user)) echo "value=\"" . $user->last_name . "\" readonly" ?> name="last_name" type="text" placeholder="Last Name" required>
                            <span class="input-group-addon  border-radius custom-addon">
                                <i class="ion-email"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input class="form-control border-radius border-right" <?php if (isset($user)) echo "value=\"" . $user->email . "\" readonly" ?> type="email" name="email" placeholder="E-mail">
                            <span class="input-group-addon  border-radius custom-addon">
                                <i class="ion-ios-telephone"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input class="form-control border-radius border-right" <?php if (isset($user)) echo "value=\"" . $user->phone . "\" readonly" ?> type="tel" name="phone" placeholder="Phone">
                            <span class="input-group-addon  border-radius custom-addon">
                                <i class="ion-ios-telephone"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input class="form-control border-radius border-right" <?php if (isset($user)) echo "value=\"" . $user->cin . "\" readonly" ?> type="text" name="cin" placeholder="CIN">
                            <span class="input-group-addon  border-radius custom-addon">
                                <i class="ion-ios-telephone"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input class="form-control border-radius border-right" value="1" min="1" max="<?php echo $voyage->nb_place ?>" type="number" id="nb_place" name="nb_place" placeholder="Number of places">
                            <span class="input-group-addon  border-radius custom-addon">
                                <i class="ion-ios-telephone"></i>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-default border-radius custom-button" name="reserver">Book</button>
                    </form>
                </div> <!-- /.col-sm-6 -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="section-title">
                                Informations about the tour
                            </h2>
                            <div class="form">
                                <div class="input-group">
                                    <input class="form-control border-radius border-right" value="<?php echo $voyage->ville_depart ?>" readonly type="text" placeholder="Prenom" name="first_name" required>
                                    <span class="input-group-addon  border-radius custom-addon">
                                    </span>
                                </div>
                                <div class="input-group">
                                    <input class="form-control border-radius border-right" value="<?php echo $voyage->ville_arrive ?>" readonly name="last_name" type="text" placeholder="Nom" required>
                                    <span class="input-group-addon  border-radius custom-addon">
                                    </span>
                                </div>
                                <div class="input-group">
                                    <input class="form-control border-radius border-right" value="<?php echo $voyage->date_depart ?>" readonly type="text" name="email" placeholder="E-mail">
                                    <span class="input-group-addon  border-radius custom-addon">
                                    </span>
                                </div>
                                <div class="input-group">
                                    <input class="form-control border-radius border-right" value="<?php echo $voyage->date_arrive ?>" readonly type="text" name="phone" placeholder="Telephone">
                                    <span class="input-group-addon  border-radius custom-addon">
                                    </span>
                                </div>
                                <div style="margin-left: 40%; margin-top: 15%;">
                                    <h3 style="color: black;">Price: <span class="price"><?php echo $voyage->prix ?></span> DH</h3>
                                </div>
                            </div>
                        </div> <!-- /.col-sm-6 -->
                    </div>
                </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: black;">Response:</h4>
        </div>
        <div class="modal-body">
          <p>Booking done.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default custom-button" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


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


    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $('#myModal').modal('hide');
        $("#nb_place").on("input", function() {
            $('.price').text(($(this).val() * <?php echo $voyage->prix ?>));
            $('.price').val(($(this).val() * <?php echo $voyage->prix ?>));
        });

        $('form').on('submit', function(e) {
            e.preventDefault();
            var data = $('form').serializeArray();
            data.push({
                name: 'reserver',
                value: 'hello'
            });
            $.ajax({
                url: "../Controllers/Reservation.php",
                type: 'POST',
                data: data,
                success: function(res) {
                    console.log("done");
                    $('#myModal').modal('show');
                },
                error: function(res) {
                    console.log("error");
                }
            })
        });
    </script>






</body>

</html>