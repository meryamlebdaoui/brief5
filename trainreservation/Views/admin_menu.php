<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Account</title>


  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <script type="text/javascript">
    function dis() {
      var x = document.getElementById('hada');
      if (x.style.display === 'none') {
        x.style.display = 'block';
      } else {
        x.style.display = 'none';
      }
    }
  </script>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" style="position: absolute;z-index: 10;">
      <div id="hada" style="height:730px">
        <center>
          <h3 style="margin-top:10.3%;">Travel Now</h3>
        </center>
        <div class="list-group list-group-flush">
          <a href="profile.php" class="list-group-item list-group-item-action bg-light">My profile</a>
          <a href="edit_profile.php" class="list-group-item list-group-item-action bg-light">Update profile</a>
          <?php
          //session_start();
          if ($_SESSION['type']=='Admin') { ?>
            <a href="train.php" class="list-group-item list-group-item-action bg-light">Add a train</a>
            <a href="trains.php" class="list-group-item list-group-item-action bg-light">List of trains</a>
            <a href="voyage.php" class="list-group-item list-group-item-action bg-light">Add a Tour</a>
            <a href="voyages.php" class="list-group-item list-group-item-action bg-light">List of Tours</a>
            <a href="reservations.php" class="list-group-item list-group-item-action bg-light">List of reservations</a>
            <a href="messages.php" class="list-group-item list-group-item-action bg-light">List of messages</a>
          <?php } else if ($_SESSION['type'] == 'Client') { ?>
            <a href="reservations.php" class="list-group-item list-group-item-action bg-light">My reservations</a>
            <a href="../index.php#search" class="list-group-item list-group-item-action bg-light">New booking</a>
          <?php } ?>
          <a href="../Controllers/Logout.php" class="list-group-item list-group-item-action bg-light">Log Out</a>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" style="z-index: 100;">
        <img src="assets/images/menu.png" onclick="dis()" class="img-responsive" id="img">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a href="accueil.jsp">
                <img src="assets/images/uti.png" class="img-responsive" style="width: 30px; " id="menu-toggle">
              </a>
            </li>
          </ul>
        </div>
      </nav>


</body>

</html>