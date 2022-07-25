<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/Langue.class.php";
include dirname(__DIR__)."/models/LangueManager.class.php";

class LangueController {
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
        $langueManager = new LangueManager();
        $resultat = $langueManager->getAllLangues($this->route_info[1]);
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $response = Constants::$DEFAULT_RESPONSE;
        if (count($this->route_info) == 4){
            $langueManager = new LangueManager();
            $resultat = $langueManager->getById($this->route_info[1], $this->route_info[3]);
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
        $libelle = $dico["libelle"];
        $niveau = $dico["niveau"];
        $idcv = $this->route_info[1];
        
        $langue = new Langue($libelle, $niveau, $idcv);
        $langueManager = new LangueManager();
        $resultat = $langueManager->create($langue);

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
        $libelle = $dico["libelle"];
        $niveau = $dico["niveau"];
        $idcv = $this->route_info[1];
        $idLangue = $this->route_info[3];
        
        $langue = new Langue($libelle, $niveau, $idcv);
        $langue->id = $idLangue;
        $langueManager = new LangueManager();
        $resultat = $langueManager->update($langue);

        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["resultat"] = $response["data"];
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
        }
        return $response;
    }

    public function delete(){
        $response = Constants::$DEFAULT_RESPONSE;
        $idLangue = $this->route_info[3];
        $langueManager = new LangueManager();
        $resultat = $langueManager->delete($idLangue);
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
             && $this->route_info[2] == "langues" && trim($this->route_info[3]) == "" ){
            if ( $this->method == Constants::$POST ){
                $json = json_encode($this->create());
            }
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getAll());
            }
        }

        if ( count($this->route_info) == 4 &&  $this->route_info[0] == "cvs"
             && $this->route_info[2] == "langues" && trim($this->route_info[3]) != "" ){
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