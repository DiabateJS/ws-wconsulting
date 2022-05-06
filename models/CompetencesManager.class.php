<?php
class CompetencesManager {
    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function create() {
        return array();
    }

    function getAllLanguages(){
        $sql = "select id, libelle from languages";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllFrameworks(){
        $sql = "select id, libelle from frameworks";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllSgbd(){
        $sql = "select id, libelle from sgbd";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllOs(){
        $sql = "select id, libelle from os";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllOutils(){
        $sql = "select id, libelle from outils";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllMethodes(){
        $sql = "select id, libelle from methodes";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllDevops(){
        $sql = "select id, libelle from devops";
        $entete = array("id","libelle");
        $result = $this->bdManager->executeSelect($sql, $entete);
        return $result;
    }

    function getAllCompetences(){
        $resultat = array(
            "data" => [],
            "errors" => []
        );
        $competences = array();
        $competences["languages"] = $this->getAllLanguages()["data"];
        $competences["frameworks"] = $this->getAllFrameworks()["data"];
        $competences["sgbd"] = $this->getAllSgbd()["data"];
        $competences["os"] = $this->getAllOs()["data"];
        $competences["outils"] = $this->getAllOutils()["data"];
        $competences["methodes"] = $this->getAllMethodes()["data"];
        $competences["devops"] = $this->getAllDevops()["data"];
        $resultat["data"] = $competences;
        return $resultat;
    }

}

?>