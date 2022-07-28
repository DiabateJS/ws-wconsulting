<?php
include 'bd.class.php';
include "../utils/Constants.class.php";

class CvManager {

    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function createCv($cv) {
        $sql = Constants::$SQL_CREATE_CV;
        $dicoParam = array (
            "titre" => $cv->titre,
            "poste" => $cv->poste,
            "annee" => $cv->annee,
            "dispo" => $cv->dispo,
            "intro" => $cv->intro,
            "userid" => $cv->userid
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function update($cv) {
        $sql = "update cv set titre=:titre, poste=:poste, annee=:annee, dispo=:dispo, intro=:intro where id=:idCv";
        $dicoParam = array (
            "titre" => $cv->titre,
            "poste" => $cv->poste,
            "annee" => $cv->annee,
            "dispo" => $cv->dispo,
            "intro" => $cv->intro,
            "idCv"  => $cv->id
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function getAll(){
        $sql = Constants::$SQL_ALL_CV;
        $entete = array("id","titre","poste","annee","dispo","intro","userid","name");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getById($id){
        $sql = Constants::$SQL_CV_BY_ID;
        $entete = array("id","titre","poste","annee","dispo","intro","userid","name");
        $dicoParam = array (
            "id" => $id
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);

        $sql = Constants::$SQL_CV_LANGUAGES_BY_ID;
        $entete = array("id","libelle", "level");
        $result1 = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        $result["data"][0]["langages"] = $result1["data"];
        return $result;
    }
}

?>