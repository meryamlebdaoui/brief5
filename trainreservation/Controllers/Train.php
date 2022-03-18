<?php

require_once __DIR__."/../Models/Train.php";

if(isset($_POST['add'])){
    $train = new Train(0, $_POST['name'], $_POST['nb_place']);
    $train->save();
    header('Location: ../Views/trains.php');
}

?>