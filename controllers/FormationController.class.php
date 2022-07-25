<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/Formation.class.php";
include dirname(__DIR__)."/models/FormationManager.class.php";

class FormationController {
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
        $formationManager = new FormationManager();
        $resultat = $formationManager->getAllFormations($this->route_info[1]);
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $response = Constants::$DEFAULT_RESPONSE;
        if (count($this->route_info) == 4){
            $formationManager = new FormationManager();
            $resultat = $formationManager->getById($this->route_info[1], $this->route_info[3]);
            if (count($resultat["errors"]) == 0){
                $response["code"] = Constants::$SUCESS_CODE;
                $response["resultat"] = $resultat["data"];
            }
        }
        return $response;
    }

    public function create(){
        $response = Constants::$DEFAULT_RESPONSE;
        $dico = $this->dico[Constants::$POST];
        $organisme = $dico["organisme"];
        $annee = $dico["annee"];
        $description = $dico["description"];
        $idcv = $this->route_info[1];
        
        $formation = new Formation($organisme, $annee, $description, $idcv);
        $formationManager = new FormationManager();
        $resultat = $formationManager->create($formation);

        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["resultat"] = $response["data"];
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
        }
        return $response;
    }

    public function update(){
        $response = Constants::$DEFAULT_RESPONSE;
        $dico = $this->dico[Constants::$PUT];
        $organisme = $dico["organisme"];
        $annee = $dico["annee"];
        $description = $dico["description"];
        $idcv = $this->route_info[1];
        $idFormation = $this->route_info[3];
        
        $formation = new Formation($organisme, $annee, $description, $idcv);
        $formation->id = $idFormation;
        $formationManager = new FormationManager();
        $resultat = $formationManager->update($formation);

        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["resultat"] = $response["data"];
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
        }
        return $response;
    }

    public function delete(){
        $response = Constants::$DEFAULT_RESPONSE;
        $idFormation = $this->route_info[3];
        $formationManager = new FormationManager();
        $resultat = $formationManager->delete($idFormation);
        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["resultat"] = $response["data"];
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
        }
        return $response;
    }

    public function getView(){
        $json = "";
        if ( count($this->route_info) == 4 &&  $this->route_info[0] == "cvs"
             && $this->route_info[2] == "formations" && trim($this->route_info[3]) == "" ){
            if ( $this->method == Constants::$POST ){
                $json = json_encode($this->create());
            }
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getAll());
            }
        }

        if ( count($this->route_info) == 4 &&  $this->route_info[0] == "cvs"
             && $this->route_info[2] == "formations" && trim($this->route_info[3]) != "" ){
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getById());
            }
            if ( $this->method == Constants::$DELETE ){
                $json = json_encode($this->delete());
            }
            if ( $this->method == Constants::$PUT ){
                $json = json_encode($this->update());
            }
        }
        return $json;
    }

} 
?>