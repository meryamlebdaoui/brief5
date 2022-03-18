<?php

require_once "Connection.php";

class Voyage{

    private $table = "Voyage";
    public $id;
    public $ville_depart;
    public $ville_arrive;
    public $date_depart;
    public $date_arrive;
    public $nb_place;
    public $prix;
    public $train;

    public function __construct($id, $ville_depart, $ville_arrive, $date_depart, $date_arrive, $nb_place, $prix, $train){
        $this->id = $id;
        $this->ville_depart = $ville_depart;
        $this->ville_arrive = $ville_arrive;
        $this->date_depart = $date_depart;
        $this->date_arrive = $date_arrive;
        $this->nb_place = $nb_place;
        $this->prix = $prix;
        $this->train = $train;
    }

    public function save(){
        $ctn=new Connection();
		$ctn->insert($this->table,["id","ville_depart","ville_arrive", "date_depart", "date_arrive", "nb_place", "prix", "idTrain"],[0,
        $this->ville_depart,$this->ville_arrive,$this->date_depart,$this->date_arrive,$this->nb_place,$this->prix,$this->train]);
    }

    public static function getAll(){
        $ctn=new Connection();
        return $ctn->selectAll("Voyage");
    }

    public static function findLot($date_depart, $ville_depart, $ville_arrive){
        $ctn=new Connection();
        $conn = $ctn->getConnection();
        $query = $conn->prepare("SELECT * FROM `Voyage` where date_depart > '$date_depart' AND ville_depart LIKE '%$ville_depart%' AND ville_arrive LIKE '%$ville_arrive%' AND nb_place>0");
		$query->execute();
		return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOne($id){
        $ctn=new Connection();
        $result = $ctn->selectOne("Voyage", $id);
        return new Voyage($id, $result['ville_depart'], $result['ville_arrive'], $result['date_depart'], $result['date_arrive'], $result['nb_place'], $result['prix'], $result['idTrain']);
    }

    public static function demenuer($nb, $id){
        $ctn=new Connection();
        $conn = $ctn->getConnection();
        $str = "UPDATE `Voyage` SET `nb_place`= `nb_place` - $nb WHERE `id`=$id";
		$query = $conn->prepare($str);
		$query->execute();
    }

}

?>