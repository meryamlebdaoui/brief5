<?php

require_once "Connection.php";

class Messages{
    private $table = 'Messages';
    public $id;
    public $email;
    public $message;
    public function __construct($id, $email, $message)
    {
        $this->id = $id;
        $this->email = $email;
        $this->message = $message;
    }

    public function save(){
        $ctn=new Connection();
		$ctn->insert($this->table,["id", "email", "message"], [$this->id, $this->email, $this->message]);
    }

    public static function getAll(){
        $ctn=new Connection();
        return $ctn->selectAll("Messages");
    }
}

?>