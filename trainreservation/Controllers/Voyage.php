<?php

require_once __DIR__."/../Models/Voyage.php";
require_once __DIR__."/../Models/Reservation.php";

if(isset($_POST['add'])){
    $ddepart = date_format(date_create($_POST['ddepart']),"Y-m-d H:i");
    $darrive = date_format(date_create($_POST['darrivee']),"Y-m-d H:i");
    //echo $ddepart;
    $voyage = new Voyage(0, $_POST['depart'], $_POST['arrivee'], $ddepart, $darrive, $_POST['nb_place'], $_POST['price'], $_POST['train']);
    $voyage->save();
    header('Location: ../Views/voyages.php');
}
else if(isset($_POST['search'])){
    if(!isset($_POST['ville_depart'])) $vdepart = "";
    else $vdepart = $_POST['ville_depart'];
    if(!isset($_POST['ville_arrivee'])) $varrivee = "";
    else $varrivee = $_POST['ville_arrivee'];
    //if(!isset($_POST['ddepart'])) $date = "";
    $ddepart = date_format(date_create($_POST['ddepart']),"Y-m-d");
    echo search($ddepart, $vdepart, $varrivee);
}
else if(isset($_GET['id'])){
    $id = $_GET['id'];
    header("Location: ../Views/reservation.php?id=$id");
}
else if(isset($_POST['delete'])){
    Voyage::delete($_POST['id']);
    Reservation::deleteByVoyage($_POST['id']);
    header("Location: ../Views/Voyages.php");
}

function search($ddepart, $ville_depart, $ville_arrivee){
    $result = Voyage::findLot($ddepart, $ville_depart, $ville_arrivee);
    $json = json_encode( $result );
    return $json;
}

?>