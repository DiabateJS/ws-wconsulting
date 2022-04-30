<?php

class Formation {
    public $id;
    public $organisme;
    public $annee;
    public $description;
    public $idcv;

    function __construct($organisme, $annee, $description, $idcv){
        $this->organisme = $organisme;
        $this->annee = $annee;
        $this->description = $description;
        $this->idcv = $idcv;
    }
}
?>