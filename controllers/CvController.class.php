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
        $response = Constants::$DEFAULT_RESPONSE;
        $cvManager = new CvManager();
        $resultat = $cvManager->getAll();
        if (count($resultat["errors"]) == 0){
            $response["code"] = Constants::$SUCESS_CODE;
            $response["resultat"] = $resultat["data"];
        }
        return $response;
    }

    public function getById(){
        $begin = $this->route_info[0];
        $id = $this->route_info[1];

        $response = Constants::$DEFAULT_RESPONSE;
        if ($begin == "cvs" && strlen($id) > 0){
            $cvManager = new CvManager();
            $resultat = $cvManager->getById($id);
            if (count($resultat["errors"]) == 0){
                $response["code"] = Constants::$SUCESS_CODE;;
                $response["resultat"] = $resultat["data"];
            }
        }
        return $response;
    }

    public function create(){
        $response = Constants::$DEFAULT_RESPONSE;

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
        if ( $this->url == "cvs/" ){
            if ( $this->method == Constants::$POST ){
                $json = json_encode($this->create());
            }
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getAll());
            }
        }

        if ( $this->route_info[0] == "cvs" &&  $this->route_info[1] != "" ){
            if ( $this->method == Constants::$GET ){
                $json = json_encode($this->getById());
            }
        }
        return $json;
    }

} 
?>