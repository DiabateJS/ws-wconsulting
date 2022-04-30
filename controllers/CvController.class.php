<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/Cv.class.php";
include dirname(__DIR__)."/models/CvManager.class.php";

class CvController {
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
        if ($this->method == Constants::$GET){

        }
    }

    public function getById(){
        if ($this->method == Constants::$GET){

        }
    }

    public function create(){
        $response = array(
            "message" => "",
            "code" => Constants::$SERVER_ERROR_CODE,
            "errors" => []
        );

        $titre = $this->dico["titre"];
        $poste = $this->dico["poste"];
        $annee = $this->dico["annee"];
        $dispo = $this->dico["dispo"];
        $intro = $this->dico["intro"];
        $userid = $this->dico["userid"];
        $cv = new Cv($titre, $poste, $annee, $dispo, $intro, $userid, [],[],[]);
        $cvManager = new CvManager();
        $resultat = $cvManager->createCv($cv);

        $response["code"] = Constants::$SERVER_ERROR_CODE;
        $response["message"] = $response["data"];
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
        if ( $this->method == Constants::$POST && $this->url == "cvs/" ){
            return json_encode($this->create());
        }
    }

} 
?>