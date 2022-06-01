<?php

require_once "Connection.php";
require_once "User.php";

class Admin {
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public function __construct($id, $first_name, $last_name, $username, $password){
            $this->id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->username = $username;
            $this->password = $password;
    }

    public function update(){
        $user = new User($this->first_name, $this->last_name, $this->username, $this->password, "admin");
        $user->id = $this->id;
        $user->update();
    }
}
