<?php

class Competences {
    public $languages;
    public $frameworks;
    public $sgbd;
    public $os;
    public $outils;
    public $methodes;
    public $devops;

    function __construct($languages, $frameworks, $sgbd, $os, $outils, $methodes, $devops){
        $this->languages = $languages;
        $this->frameworks = $frameworks;
        $this->sgbd = $sgbd;
        $this->os = $os;
        $this->outils = $outils;
        $this->methodes = $methodes;
        $this->devops = $devops;
    }
}
?>