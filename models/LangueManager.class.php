<?php
include "./bd.class.php";
include "../utils/Constants.class.php";

class LangueManager {

    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function create($langue) {
        $sql = Constants::$SQL_CREATE_LANGUE;
        $dicoParam = array (
            "libelle" => $langue->libelle,
            "niveau" => $langue->niveau,
            "idcv" => $langue->idcv
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function delete($idLangue) {
        $sql = Constants::$SQL_DELETE_LANGUE;
        $dicoParam = array (
            "idLangue" => $idLangue
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }

    function update($langue){
        $sql = Constants::$SQL_UPDATE_LANGUE;
        $dicoParam = array (
            "libelle" => $langue->libelle,
            "niveau" => $langue->niveau,
            "idLangue" => $langue->id
        );
        $result = $this->bdManager->executePreparedQuery($sql, $dicoParam);
        return $result;
    }



    function getAllLangues($idcv){
        $sql = Constants::$SQL_SELECT_LANGUES;
        $entete = array("id","libelle","niveau");
        $dicoParam = array(
            "idcv" => $idcv
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }

    function getById($idcv, $idLangue){
        $sql = Constants::$SQL_SELECT_LANGUE_BY_ID;
        $entete = array("id","libelle","niveau");
        $dicoParam = array (
            "idcv" => $idcv,
            "idLangue" => $idLangue
        );
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }
}

?>