<?php

class Langue {
    public $id;
    public $libelle;
    public $niveau;
    public $idcv;

    function __construct($libelle, $niveau, $idcv){
        $this->libelle = $libelle;
        $this->niveau = $niveau;
        $this->idcv = $idcv;
    }
}
?>