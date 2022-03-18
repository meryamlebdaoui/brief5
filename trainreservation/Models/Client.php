<?php

require_once "Connection.php";
require_once "User.php";

class Client {
    private $table = "Client";
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $cin;

    public function __construct($id, $first_name, $last_name, $username, $password, $email, $phone, $cin){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->cin = $cin;
    }

    public function getUsername(){
        return $this->username;
    }

    public static function getOne($id){
        $ctn=new Connection();
        $user = $ctn->selectOne('User', $id);
        $client = $ctn->selectOne('Client', $id);
        return new Client($id, $user['first_name'], $user['last_name'], $user['username'], $user['password'], $client['email'], $client['phone'], $client['cin']);
    }

    public function save(){
        $ctn=new Connection();
        $user = new User($this->first_name, $this->last_name, $this->username, $this->password, "user");
        $user = $user->save();
        $this->id = $user->id;
		$ctn->insert($this->table,["id", "email", "phone", "cin"],[$this->id, $this->email, $this->phone, $this->cin]);
        return $this;
	}

    public function update(){
        $ctn = new Connection();
        $ctn->update($this->table, ['email', 'phone', 'cin'], [$this->email, $this->phone, $this->cin], $this->id);
        $user = new User($this->first_name, $this->last_name, $this->username, $this->password, "user");
        $user->id = $this->id;
        $user->update();
    }
}

?>