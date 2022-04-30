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

    function getAll(){
        $sql = Constants::$SQL_ALL_CV;
        $entete = array("id","titre","poste","annee","dispo","intro","userid","name");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getById($id){
        $sql = "select c.id, c.titre, c.poste, c.annee, c.dispo, c.intro, c.userid, u.name from cv c, user u where c.userid = u.id and c.id = :id";
        $entete = array("id","titre","poste","annee","dispo","intro","userid","name");
        $dicoParam = array (
            "id" => $id
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }
}

?>