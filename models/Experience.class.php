<?php

class Experience {
    public $id;
    public $client;
    public $description;
    public $idcv;

    function __construct($client, $description, $idcv){
        $this->client = $client;
        $this->description = $description;
        $this->idcv = $idcv;
    }
}
?>