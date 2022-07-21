<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/CompetenceFonctionnelle.class.php";
include dirname(__DIR__)."/models/CompetenceFonctionnelleManager.class.php";

class CompetenceFonctionnelleController {
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
        $competencesFonctManager = new CompetenceFonctionnelleManager();
        $resultat = $competencesFonctManager->getAllCompetencesFonctionnelles($this->route_info[1]);
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $response = Constants::$DEFAULT_RESPONSE;
        if (count($this->route_info) == 4){
            $competenceFonctionnelleManager = new CompetenceFonctionnelleManager();
            $resultat = $competenceFonctionnelleManager->getById($this->route_info[1], $this->route_info[3]);
            if (count($resultat["errors"]) == 0){
                $response["code"] = Constants::$SUCESS_CODE;
                $response["resultat"] = $resultat["data"];
            }
        }
        return $response;
    }

    public function create(){
        $response = Constants::$DEFAULT_RESPONSE;

        $idcv = $this->route_info[1];
        $libelle = $this->dico["libelle"];
        $description = $this->dico["description"];
        
        $competenceFonctionnelle = new CompetenceFonctionnelle($libelle, $description, $idcv);
        $competenceFonctionnelleManager = new CompetenceFonctionnelleManager();
        $resultat = $competenceFonctionnelleManager->create($competenceFonctionnelle);

        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["resultat"] = $response["data"];
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
        }
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
        if ( count($this->route_info) == 4 &&  $this->route_info[0] == "cvs"
             && $this->route_info[2] == "competences_fonctionnelles" && trim($this->route_info[3]) == "" ){
            if ( $this->method == Constants::$POST ){
                $json = json_encode($this->create());
            }
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getAll());
            }
        }

        if ( count($this->route_info) == 4 &&  $this->route_info[0] == "cvs"
             && $this->route_info[2] == "competences_fonctionnelles" && trim($this->route_info[3]) != "" ){
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getById());
            }
        }

        return $json;
    }

} 
?>