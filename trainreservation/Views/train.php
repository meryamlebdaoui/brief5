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
      border-radius: 7px;
      height: 60%;
    }

    input {
      width: 80%;
      border-radius: 7px;
    }
  </style>

</head>

<body>

  <?php session_start(); include 'admin_menu.php'; ?>
  <center>

    <h1 style="margin-top:1%;">Add a train</h1>
  </center>
  <center style="margin-top:4%;">

    <form action="../Controllers/Train.php" method="POST">
      <table align="center" style="width: 80%; height:400px; border: 4px solid black;">
        <tr>
          <td class="cls">
            Name of train:
          </td>
          <td>
            <input type="text" name="name" class="input">
          </td>
        </tr>

        <tr>
          <td class="cls">
            Number of places:
          </td>
          <td>
            <input type="number" name="nb_place" class="input">
          </td>
        </tr>

        <tr class="">
          <td colspan="2">
            <input class="btn btn-primary d-flex justify-content-center m-auto" type="submit" name="add" value="Add">
          </td>
        </tr>
      </table>
    </form>
  </center>
</body>

</html>