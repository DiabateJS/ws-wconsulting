<?php
include "./bd.class.php";
include "../utils/Constants.class.php";

class CompetenceFonctionnelleManager {

    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function create($competenceFonctionnelle) {
        $sql = Constants::$SQL_CREATE_COMPETENCE_FONCTIONNELLE;
        $dicoParam = array (
            "libelle" => $competenceFonctionnelle->libelle,
            "description" => $competenceFonctionnelle->description,
            "idcv" => $competenceFonctionnelle->idcv
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function update($competenceFonctionnelle) {
        $sql = Constants::$SQL_UPDATE_COMPETENCE_FONCTIONNELLE;
        $dicoParam = array (
            "libelle" => $competenceFonctionnelle->libelle,
            "description" => $competenceFonctionnelle->description,
            "idExprFonct" => $competenceFonctionnelle->id
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function delete($idExprFonct) {
        $sql = Constants::$SQL_DELETE_COMPETENCE_FONCTIONNELLE;
        $dicoParam = array (
            "idExprFonct" => $idExprFonct
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function getAllCompetencesFonctionnelles($idcv){
        $sql = Constants::$SQL_SELECT_COMPETENCES_FONCTIONNELLES;
        $entete = array("id","libelle","description");
        $dicoParam = array(
            "idcv" => $idcv
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }

    function getById($idcv, $idCompFonctionnelle){
        $sql = Constants::$SQL_SELECT_COMPETENCE_FONCTIONNELLE;
        $entete = array("id","libelle","description");
        $dicoParam = array (
            "idcv" => $idcv,
            "idCompFonct" => $idCompFonctionnelle
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }
}

?>