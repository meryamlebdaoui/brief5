<?php

require_once "Connection.php";
require_once "Client.php";
require_once "Admin.php";

class User{
    private $table = "User";
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $type;

    public function __construct($first_name, $last_name, $username, $password, $type){
            $this->id = 0;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->username = $username;
            $this->password = $password;
            $this->type = $type;
    }

    public function save(){
        $ctn=new Connection();
		$ctn->insert($this->table,["id","first_name","last_name","username","password","type"],[$this->id, $this->first_name,$this->last_name, $this->username, $this->password, $this->type]);
        $result = $this->auth($this->username, $this->password);
        $this->id = $result['id'];
        return $this;
    }

	public static function select()
	{
		$ctn=new Connection();
		return $ctn->selectAll("User");
	}

	public static function delete($id)
	{
		$ctn=new Connection();
		return $ctn->delete("User",$id);
	}


	public static function edit($id)
	{
		$ctn=new Connection();
		return $ctn->selectOne("User",$id);
	}

	public function update()
	{
		$ctn=new Connection();
		$ctn->update($this->table,["first_name","last_name","username","password","type"],[$this->first_name,$this->last_name, $this->username, $this->password, $this->type],$this->id);
	}

    public static function auth($username, $password){
        $ctn=new Connection();
        $conn = $ctn->getConnection();
        $query=$conn->prepare("SELECT * FROM `User` where username='$username' AND password='$password'");
		$query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function login($username, $password){
        $ctn=new Connection();
        $result = User::auth($username, $password);
        if($result['type']=="admin"){
            $admin = new Admin($result['id'], $result['first_name'], $result['last_name'], $result['username'], $result['password']);
            return $admin;
        }
        else if($result['type']=="user"){
            $res = $ctn->selectOne("Client", $result['id']);
            $client = new Client($result['id'], $result['first_name'], $result['last_name'], $result['username'], $result['password'], $res['email'], $res['phone'], $res['cin']);
            return $client;
        }
        else{
            return false;
        }
    }


}
