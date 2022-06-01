<?php

require_once __DIR__ . "/../Models/Voyage.php";

$voyages = Voyage::getAll();

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

  <?php session_start(); include 'admin_menu.php'; ?>
  <center>
    <h1 style="margin-top:1%;">List of Tours</h1>



    <table style="width: 90%;">
      <thead>
        <tr>
          <th>Start City</th>
          <th>Arrival City</th>
          <th>Start Date</th>
          <th>Arrival Date</th>
          <th>Number of places</th>
          <th>Price</th>
          <th>Train</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($voyages as $row) { ?>
          <tr>
            <td><?php echo $row['ville_depart'] ?></td>
            <td><?php echo $row['ville_arrive'] ?></td>
            <td><?php echo $row['date_depart'] ?></td>
            <td><?php echo $row['date_arrive'] ?></td>
            <td><?php echo $row['nb_place'] ?></td>
            <td><?php echo $row['prix'] ?></td>
            <td><?php echo $row['idTrain'] ?></td>
            <td>
              <form method="POST" action="../Controllers/Voyage.php">
                <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                <input type="submit" name="delete" class="btn btn-danger" value="Supprimer">
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </center>
</body>

</html>