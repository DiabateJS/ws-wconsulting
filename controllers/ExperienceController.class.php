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

    private function getDefaultResponse() {
        return array(
            "resultat" => "",
            "code" => Constants::$SERVER_ERROR_CODE,
            "errors" => []
        );
    }

    public function getAll(){
        $response = $this->getDefaultResponse();
        $expManager = new ExperienceManager();
        $resultat = $expManager->getAllExperiences($this->route_info[1]);
        if (count($resultat["errors"]) == 0){
            $response["code"] = $resultat["code"];
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $response = $this->getDefaultResponse();
        if (count($this->route_info) == 4){
            $expManager = new ExperienceManager();
            $resultat = $expManager->getById($this->route_info[1], $this->route_info[3]);
            if (count($resultat["errors"]) == 0){
                $response["code"] = $resultat["code"];
                $response["resultat"] = $resultat["data"];
            }
        }
        return $response;
    }

    public function create(){
        $response = $this->getDefaultResponse();

        $client = $this->dico["client"];
        $description = $this->dico["description"];
        $idcv = $this->route_info[1];
        
        $experience = new Experience($client, $description, $idcv);
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
        }
        return $json;
    }

} 
?>