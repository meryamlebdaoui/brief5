<?php

require_once __DIR__."/../Models/Reservation.php";
require_once __DIR__."/../Models/Voyage.php";

if(isset($_POST['reserver'])){
    session_start();
    if($_SESSION['type']=='Client'){
        $reservation = new Reservation(0, 1, null, null, null, null, null, $_POST['idUser'], $_POST['idVoyage'], $_POST['prix']);
        $reservation->saveFromUser();
    }
    else{
        $reservation = new Reservation(0, 1, $_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email'], $_POST['cin'], null, $_POST['idVoyage'], $_POST['prix']);
        $reservation->saveNew();
    }
    Voyage::demenuer($_POST['nb_place'], $_POST['idVoyage']);
}
else if(isset($_POST['annuler'])){
    Reservation::annuler($_POST['id']);
}
else if(isset($_POST['activer'])){
    Reservation::activer($_POST['id']);
}
