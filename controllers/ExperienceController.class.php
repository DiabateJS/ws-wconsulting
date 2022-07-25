<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/Experience.class.php";
include dirname(__DIR__)."/models/ExperienceManager.class.php";

class ExperienceController {
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
        $expManager = new ExperienceManager();
        $resultat = $expManager->getAllExperiences($this->route_info[1]);
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $response = Constants::$DEFAULT_RESPONSE;
        if (count($this->route_info) == 4){
            $expManager = new ExperienceManager();
            $resultat = $expManager->getById($this->route_info[1], $this->route_info[3]);
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
        $client = $dico["client"];
        $description = $dico["description"];
        $taches = $dico["taches"];
        $ville = $dico["ville"]; 
        $projet = $dico["projet"]; 
        $poste = $dico["poste"];
        $debut = $dico["debut"];
        $fin = $dico["fin"];
        $envtech = $dico["envtech"];
        $idcv = $this->route_info[1];

        $experience = new Experience($client, $description, $taches, $ville, $projet, $poste, $debut, $fin, $envtech, $idcv);
        $expManager = new ExperienceManager();
        $resultat = $expManager->create($experience);

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
        $client = $dico["client"];
        $description = $dico["description"];
        $taches = $dico["taches"];
        $ville = $dico["ville"]; 
        $projet = $dico["projet"]; 
        $poste = $dico["poste"];
        $debut = $dico["debut"];
        $fin = $dico["fin"];
        $envtech = $dico["envtech"];
        $idcv = $this->route_info[1];
        $idExp = $this->route_info[3];

        $experience = new Experience($client, $description, $taches, $ville, $projet, $poste, $debut, $fin, $envtech, $idcv);
        $experience->id = $idExp;
        $expManager = new ExperienceManager();
        $resultat = $expManager->update($experience);

        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["resultat"] = $response["data"];
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
        }
        return $response;
    }

    public function delete(){
        $response = Constants::$DEFAULT_RESPONSE;
        $idExp = $this->route_info[3];
        $expManager = new ExperienceManager();
        $resultat = $expManager->delete($idExp);

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
             && $this->route_info[2] == "experiences" && trim($this->route_info[3]) == "" ){
            if ( $this->method == Constants::$POST ){
                $json = json_encode($this->create());
            }
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getAll());
            }
        }

        if ( count($this->route_info) == 4 &&  $this->route_info[0] == "cvs"
             && $this->route_info[2] == "experiences" && trim($this->route_info[3]) != "" ){
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getById());
            }
            if ( $this->method == Constants::$PUT ){
                $json = json_encode($this->update());
            }
            if ( $this->method == Constants::$DELETE ){
                $json = json_encode($this->delete());
            }
        }
        return $json;
    }

} 
?>