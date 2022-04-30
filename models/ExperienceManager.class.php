<?php
include "./bd.class.php";
include "../utils/Constants.class.php";

class ExperienceManager {

    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function create($experience) {
        $sql = Constants::$SQL_CREATE_EXPERIENCE;
        $dicoParam = array (
            "client" => $experience->client,
            "description" => $experience->description,
            "idcv" => $experience->idcv
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function getAllExperiences($idcv){
        $sql = Constants::$SQL_SELECT_EXPERIENCES;
        $entete = array("id","client","description");
        $dicoParam = array(
            "idcv" => $idcv
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }

    function getById($idcv, $idExperience){
        $sql = Constants::$SQL_SELECT_EXPERIENCE_BY_ID;
        $entete = array("id","client","description");
        $dicoParam = array (
            "idcv" => $idcv,
            "idExperience" => $idExperience
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }
}

?>