<?php

require_once __DIR__ . "/../Models/Train.php";

$trains = Train::getAll();

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
    <h1 style="margin-top:1%;">List of trains</h1>



    <table style="width: 90%;">
      <thead>
        <tr>
          <th>Name of train</th>
          <th>Number of places</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($trains as $row) { ?>
          <tr>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['nb_place'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </center>
</body>

</html>