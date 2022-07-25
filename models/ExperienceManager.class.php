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
            "taches" => $experience->taches,
            "ville" => $experience->ville,
            "poste" => $experience->poste,
            "projet" => $experience->projet,
            "debut" => $experience->debu,
            "fin" => $experience->fin,
            "envtech" => $experience->envtech,
            "idcv" => $experience->idcv
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function update($experience) {
        $sql = Constants::$SQL_UPDATE_EXPERIENCE;
        $dicoParam = array (
            "client" => $experience->client,
            "description" => $experience->description,
            "taches" => $experience->taches,
            "ville" => $experience->ville,
            "poste" => $experience->poste,
            "projet" => $experience->projet,
            "debut" => $experience->debut,
            "fin" => $experience->fin,
            "envtech" => $experience->envtech,
            "id" => $experience->id
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function delete($idExp) {
        $sql = Constants::$SQL_DELETE_EXPERIENCE;
        $dicoParam = array (
            "idExp" => $idExp
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function getAllExperiences($idcv){
        $sql = Constants::$SQL_SELECT_EXPERIENCES;
        $entete = array("id","client","description","taches","ville","poste","projet","debut","fin","envtech");
        $dicoParam = array(
            "idcv" => $idcv
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }

    function getById($idcv, $idExperience){
        $sql = Constants::$SQL_SELECT_EXPERIENCE_BY_ID;
        $entete = array("id","client","description","taches","ville","poste","projet","debut","fin","envtech");
        $dicoParam = array (
            "idcv" => $idcv,
            "idExperience" => $idExperience
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }
}

?>