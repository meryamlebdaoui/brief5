<?php

require_once __DIR__ . "/../Models/Train.php";

$trains = Train::getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="icon" type="image/png" href="../images/logo.png" />
  <style type="text/css">
    table {
      border-radius: 10px;
      border-collapse: collapse;
      width: 100%;
      margin-top: 3%;
      background-color: #e4e7e7;
      width: 80%;
      height: 100%;

    }

    th,
    td {
      text-align: left;
      padding: 14px;
    }

    .cls {
      width: 20%;
    }

    th {
      background-color: rgb(154, 154, 184);
      color: white;
    }

    .input {
      width: 80%;
      border-radius: 5px;
      height: 80%;
    }

    input {
      width: 80%;
      border-radius: 5px;
    }
  </style>

</head>

<body>

  <?php session_start(); include 'admin_menu.php'; ?>
  <center>

    <h1 style="margin-top:1%;">Add a Tour</h1>
  </center>
  <center style="margin-top:2%;">

    <form action="../Controllers/Voyage.php" method="POST">
      <table align="center" style="width: 80%; height:680px; border: 4px solid black;">
        <tr>
          <td class="cls">
            Start City:
          </td>
          <td>
            <select class="input" name="depart" id="etat">
              <option disabled selected>Choose a city</option>
              <option value="Safi"> Safi</option>
              <option value="Casablanca"> Casablanca</option>
              <option value="Marrakech"> Marrakech</option>
              <option value="Rabat"> Rabat</option>
            </select>
          </td>
        </tr>

        <tr>
          <td class="cls">
            Arrival City:
          </td>
          <td>
            <select class="input" name="arrivee" id="etat">
              <option disabled selected> Choose a city</option>
              <option value="Safi"> Safi</option>
              <option value="Casablanca"> Casablanca</option>
              <option value="Marrakech"> Marrakech</option>
              <option value="Rabat"> Rabat</option>
            </select>
          </td>
        </tr>

        <tr>
          <td class="cls">
            Start date:
          </td>
          <td>
            <input type="datetime-local" name="ddepart">
          </td>
        </tr>

        <tr>
          <td class="cls">
            Arrival date:
          </td>
          <td>
            <input type="datetime-local" class="input" name="darrivee">
          </td>
        </tr>

        <tr>
          <td class="cls">
            Number of places:
          </td>
          <td>
            <input type="number" class="input" name="nb_place">
          </td>
        </tr>

        <tr>
          <td class="cls">
            Price:
          </td>
          <td>
            <input type="number" class="input" name="price">
          </td>
        </tr>

        <tr>
          <td class="cls">
            Train:
          </td>
          <td>
            <select class="input" name="train" id="etat">
              <option disabled selected> Choose a train</option>
              <?php foreach($trains as $row) {?>
              
              <option value="<?php echo $row['id'] ?>"><?php echo $row['nom'] ?></option>
              
              <?php } ?>
            </select>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input class="btn btn-primary" type="submit" name="add" value="Add">
          </td>
        </tr>
      </table>
    </form>
  </center>
</body>

</html>