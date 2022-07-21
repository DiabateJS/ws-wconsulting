<?php

class CompetenceFonctionnelle {
    public $libelle;
    public $description;
    public $idcv;

    function __construct($libelle, $description, $idcv){
        $this->libelle = $libelle;
        $this->description = $description;
        $this->idcv = $idcv;
    }
}
?>