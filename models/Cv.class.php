<?php

class Cv {
    public $titre;
    public $poste;
    public $annee;
    public $dispo;
    public $intro;
    public $userid;
    public $experiences;
    public $formations;
    public $langues;

    function __construct($titre, $poste, $annee, $dispo, $intro, $userid,$experiences, $formations, $langues){
        $this->titre = $titre;
        $this->poste = $poste;
        $this->annee = $annee;
        $this->dispo = $dispo;
        $this->intro = $intro;
        $this->userid = $userid;
        $this->experiences = $experiences;
        $this->formations = $formations;
        $this->langues = $langues;
    }
}
?>