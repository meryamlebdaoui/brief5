<?php

require_once "../Models/Reservation.php";
require_once "../Models/Voyage.php";
require_once "../Models/Client.php";

session_start();
switch ($_SESSION['type']) {
  case 'Client':
    $user = unserialize($_SESSION['user']);
    $reservations = Reservation::getSome($user->id);
    break;
  case 'Admin':
    $reservations = Reservation::getAll();
    break;
  default:
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <style type="text/css">
    table {
      border-radius: 10px;
      border-collapse: collapse;
      width: 100%;
      margin-top: 3%;
      background-color: #e4e7e7;
      width: 90%;
      border: 2px, solid, black;

    }

    th,
    td {
      border: 2px, solid, black;
      text-align: left;
      padding: 14px;
    }


    th {
      background-color: rgb(154, 154, 184);
      color: white;
    }
  </style>

</head>

<body>

  <?php include 'admin_menu.php'; ?>
  <center>
    <h1 style="margin-top:1%;">List of reservations</h1>



    <table style="width: 90%;">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>CIN</th>
          <th>E-mail</th>
          <th>Phone</th>
          <th>Start</th>
          <th>Arrival</th>
          <th>Number of places</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($reservations as $row) {

          $voyage = Voyage::getOne($row['idVoyage']);

        ?>
          <tr>
            <?php
            if (isset($user)) {
            ?>
              <td><?php echo $user->first_name; ?></td>
              <td><?php echo $user->last_name; ?></td>
              <td><?php echo $user->cin; ?></td>
              <td><?php echo $user->email; ?></td>
              <td><?php echo $user->phone; ?></td>
              <?php } else {
              if (isset($row['first_name'])) { ?>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['cin']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
              <?php } else {
                $client = Client::getOne($row['idUser']);
              ?>
                <td><?php echo $client->first_name; ?></td>
                <td><?php echo $client->last_name; ?></td>
                <td><?php echo $client->cin; ?></td>
                <td><?php echo $client->email; ?></td>
                <td><?php echo $client->phone; ?></td>
              <?php } ?>

            <?php } ?>
            <td><?php echo $voyage->ville_depart . " " . $voyage->date_depart; ?></td>
            <td><?php echo $voyage->ville_arrive . " " . $voyage->date_arrive; ?></td>
            <td><?php echo ($row['prix'] / $voyage->prix); ?></td>
            <td><?php echo $row['prix']; ?></td>
            <td>
              <?php
              switch ($row['etat']) {
                case 0:
                  echo "<button type=\"button\" class=\"btn btn-success\" onclick=\"change(1," . $row['id'] . ")\">Activate</button>";
                  break;
                case 1:
                  echo "<button type=\"button\" class=\"btn btn-danger\" onclick=\"change(0," . $row['id'] . ")\">Cancel</button>";
                  break;
              }
              ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </center>





  <script src="assets/js/jquery-1.11.2.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/contact.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/script.js"></script>

  <script>
    function change(etat, id) {
      if (etat == 0) {
        var data = Array();
        data.push({
          name: 'annuler',
          value: 'hello'
        });
        data.push({
          name: 'id',
          value: id
        });
        $.ajax({
          url: "../Controllers/Reservation.php",
          type: 'POST',
          data: data,
          success: function(res) {
            location.reload();
          },
          error: function() {

          }
        })
      }else{
        var data = Array();
        data.push({
          name: 'activer',
          value: 'hello'
        });
        data.push({
          name: 'id',
          value: id
        });
        $.ajax({
          url: "../Controllers/Reservation.php",
          type: 'POST',
          data: data,
          success: function(res) {
            location.reload();
          },
          error: function() {

          }
        })
      }
    }
  </script>








</body>

</html>