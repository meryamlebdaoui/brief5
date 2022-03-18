<?php

require_once __DIR__."/../Models/Message.php";

if(isset($_POST['messageB'])){
    $message = new Messages(0, $_POST['email'], $_POST['message']);
    $message->save();
}

?>