<?php

require_once __DIR__."/../Models/User.php";
require_once __DIR__."/../Models/Client.php";
require_once __DIR__."/../Models/Admin.php";

session_start();

if(isset($_POST['login'])){
    $result = User::login($_POST['username'], $_POST['pass']);
    if($result!=false){
        session_unset();
        $_SESSION['user'] = serialize($result);
        $_SESSION['type'] = get_class($result);
        header('Location: ../Views/profile.php');
    }
}
else if(isset($_POST['register'])){
    $client = new Client(0, $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['pass'], $_POST['email'], $_POST['phone'], $_POST['cin']);
    $client = $client->save();
    session_unset();
    $_SESSION['user'] = serialize($client);
    $_SESSION['type'] = get_class($client);
    header('Location: ../Views/profile.php');
}
else if(isset($_POST['modify'])){
    $old = unserialize($_SESSION['user']);
    if($_SESSION['type']=='Client'){
        $user = new Client($old->id, $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['pass'], $_POST['email'], $_POST['phone'], $_POST['cin']);
    }else{
        $user = new Admin($old->id, $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['pass']);
    }
    $user->update();
    $_SESSION['user'] = serialize($user);
    header('Location: ../Views/profile.php');
}