<?php

require_once "Connection.php";

class Train{
    
    private $table = "Train";
    public $id;
    public $nom;
    public $nb_place;

    public function __construct($id, $nom, $nb_place){
        $this->id = $id;
        $this->nom = $nom;
        $this->nb_place = $nb_place;
    }

    public function save(){
        $ctn=new Connection();
		$ctn->insert($this->table,["id","nom","nb_place"],[0, $this->nom,$this->nb_place]);
    }

    public static function getAll(){
        $ctn=new Connection();
        return $ctn->selectAll("Train");
    }

}


?>