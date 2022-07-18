<?php
include "./bd.class.php";
include "../utils/Constants.class.php";

class UserManager {

    private $bdManager;

    function __construct(){
        $this->bdManager = new BdManager();
    }

    function auth($user) {
        $sql = Constants::$SQL_SELECT_USER;
        $dicoParam = array (
            "login" => $user->login,
            "password" => $user->password,
        );
        $entete = array("id","name","login","idprofile");
        $result = $this->bdManager->executePreparedSelect($sql, $dicoParam, $entete);
        return $result;
    }

}

?>