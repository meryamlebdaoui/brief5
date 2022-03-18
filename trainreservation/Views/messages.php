<?php

require_once __DIR__ . "/../Models/Message.php";

$messages = Messages::getAll();

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
    <h1 style="margin-top:1%;">List of messages</h1>



    <table style="width: 90%;">
      <thead>
        <tr>
          <th>E-mail</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($messages as $row) { ?>
          <tr>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['message'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </center>
</body>

</html>