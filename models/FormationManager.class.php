<?php
include "./bd.class.php";
include "../utils/Constants.class.php";

class FormationManager {

    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function create($formation) {
        $sql = Constants::$SQL_CREATE_FORMATION;
        $dicoParam = array (
            "organisme" => $formation->organisme,
            "annee" => $formation->annee,
            "description" => $formation->description,
            "idcv" => $formation->idcv
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function delete($idFormation){
        $sql = Constants::$SQL_DELETE_FORMATION;
        $dicoParam = array (
            "idFormation" => $idFormation
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function update($formation){
        $sql = Constants::$SQL_UPDATE_FORMATION;
        $dicoParam = array (
            "organisme" => $formation->organisme,
            "annee" => $formation->annee,
            "description" => $formation->description,
            "idFormation" => $formation->id
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function getAllFormations($idcv){
        $sql = Constants::$SQL_SELECT_FORMATIONS;
        $entete = array("id","organisme","annee","description");
        $dicoParam = array(
            "idcv" => $idcv
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }

    function getById($idcv, $idFormation){
        $sql = Constants::$SQL_SELECT_FORMATION_BY_ID;
        $entete = array("id","organisme","annee","description");
        $dicoParam = array (
            "idcv" => $idcv,
            "idFormation" => $idFormation
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }
}

?>