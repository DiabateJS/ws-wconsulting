<?php

class Experience {
    public $id;
    public $client;
    public $description;
    public $taches;
    public $idcv;
    public $ville;
    public $projet;
    public $poste;
    public $debut;
    public $fin;
    public $envtech;

    function __construct($client, $description, $taches, $ville, $projet, $poste, $debut, $fin, $envtech, $idcv){
        $this->client = $client;
        $this->description = $description;
        $this->taches = $taches;
        $this->idcv = $idcv;
        $this->ville = $ville;
        $this->projet = $projet; 
        $this->poste = $poste;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->envtech = $envtech;
    }
}
?>