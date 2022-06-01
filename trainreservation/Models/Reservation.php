<?php

require_once "Connection.php";

class Reservation{
    private $table = 'Reservation';
    public $id;
    public $etat;
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $cin;
    public $idUser;
    public $idVoyage;
    public $prix;

    public function __construct($id, $etat, $first_name, $last_name, $phone, $email, $cin, $idUser, $idVoyage, $prix)
    {
        $this->id = $id;
        $this->etat = $etat;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->cin = $cin;
        $this->idUser = $idUser;
        $this->idVoyage = $idVoyage;
        $this->prix = $prix;
    }

    public function saveFromUser(){
        $ctn=new Connection();
		$ctn->insert($this->table,["id", "etat", "idUser", "idVoyage", "prix"],[0, 1, $this->idUser, $this->idVoyage, $this->prix]);
    }

    public static function deleteByVoyage($id){
        $ctn=new Connection();
        $conn = $ctn->getConnection();
        $query = $conn->prepare("DELETE FROM `reservation` WHERE idVoyage=$id");
		$query->execute();
    }

    public function saveNew(){
        $ctn=new Connection();
		$ctn->insert($this->table,["id", "etat", "first_name", "last_name", "email", "phone", "cin", "idVoyage", "prix"],
        [0, 1, $this->first_name, $this->last_name, $this->email, $this->phone, $this->cin, $this->idVoyage, $this->prix]);
    }

    public static function getAll(){
        $ctn=new Connection();
        return $ctn->selectAll("Reservation");
    }

    public static function getSome($id){
        $ctn=new Connection();
        $conn = $ctn->getConnection();
        $query = $conn->prepare("SELECT * FROM `Reservation` WHERE idUser=$id");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function annuler($id){
        $ctn=new Connection();
        $ctn->update('Reservation', ['etat'], [0], $id);
    }

    public static function activer($id){
        $ctn=new Connection();
        $ctn->update('Reservation', ['etat'], [1], $id);
    }

    public function save(){
        if(!isset($this->first_name)){
            $this->saveNew();
        }else{
            $this->saveFromUser();
        }
    }
}
