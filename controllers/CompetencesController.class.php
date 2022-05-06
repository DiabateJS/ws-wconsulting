<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/Competences.class.php";
include dirname(__DIR__)."/models/CompetencesManager.class.php";

class CompetencesController {
    private $dico;
    private $method;
    private $url;
    private $route_info;

    function __construct($paramDico)
    {
        $this->dico = $paramDico;
        $this->method = $paramDico["method"];
        $this->url = $paramDico["url"];
        $this->route_info = $paramDico["route_info"];    
    }

    public function getAll(){
        $response = Constants::$DEFAULT_RESPONSE;
        $competencesManager = new CompetencesManager();
        $resultat = $competencesManager->getAllCompetences();
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $response = Constants::$DEFAULT_RESPONSE;
        return $response;
    }

    public function create(){
        $response = Constants::$DEFAULT_RESPONSE;
        return $response;
    }

    public function update(){
        if ($this->method == Constants::$PUT){

        }
    }

    public function delete(){
        if ($this->method == Constants::$DELETE){

        }
    }

    public function getView(){
        $json = "";
        if ( count($this->route_info) == 2 &&  $this->route_info[0] == "competences"
             && trim($this->route_info[1]) == "" ){
            if ( $this->method == Constants::$POST ){
                $json = json_encode($this->create());
            }
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getAll());
            }
        }

        return $json;
    }

} 
?>