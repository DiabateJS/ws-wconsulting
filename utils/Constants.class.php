<?php
class Constants {
    //Constants for request parsing
    public static $QUERY_STRING = "QUERY_STRING";
    public static $REQUEST_METHOD ="REQUEST_METHOD";
    public static $PARAMS_SEPARATOR = "&";
    public static $KEY_VALUE_SEPARATOR = "=";
    public static $URL_SEPARATOR = "/";

    public static $SERVER_ERROR_CODE = 500;
    public static $SUCESS_CODE = 200;

    public static $DEFAULT_RESPONSE = array(
        "resultat" => "",
        "code" => 500,
        "errors" => []
    );

    public static $POST = "POST";
    public static $GET = "GET";
    public static $PUT = "PUT";
    public static $DELETE = "DELETE";

    public static $SERVER_QUERY_STRING_WITH_2_PARAMS = array(
        "QUERY_STRING" => "param1=un&param2=deux"
    );

    public static $SERVER_POST_REQUEST = array (
        "REQUEST_METHOD" => "POST"
    );

    public static $SERVER_GET_REQUEST = array (
        "REQUEST_METHOD" => "GET"
    );

    //Constants for test
    public static $TEST_OK = "OK";
    public static $TEST_KO = "KO";
    public static $CLASS_RED = "red";
    public static $CLASS_GREEN = "green";

    //Database parameters
    public static $PROD_BD_CONFIG = array(
        "host" => "185.98.131.90",
        "user" => "djste1070339",
        "password" => "da6ysjpqpp",
        "bdname" => "djste1070339"
    );
  
    public static $LOCAL_BD_CONFIG = array(
        "host" => "localhost",
        "user" => "root",
        "password" => "root",
        "bdname" => "cv_tech"
    );

    //SQL
    //CV
    public static $SQL_CREATE_CV = "insert into cv (titre, poste, annee, dispo, intro, userid) values (:titre, :poste, :annee, :dispo, :intro, :userid)";
    public static $SQL_ALL_CV = "select c.id, c.titre, c.poste, c.annee, c.dispo, c.intro, c.userid, u.name from cv c, user u where c.userid = u.id";
    public static $SQL_CV_BY_ID = "select c.id, c.titre, c.poste, c.annee, c.dispo, c.intro, c.userid, u.name from cv c, user u where c.userid = u.id and c.id = :id";
    public static $SQL_CV_LANGUAGES_BY_ID = "select cl.id, l.libelle, cl.level from cv_languages cl, languages l where cl.idlangage = l.id and idcv = :id";

    //EXPERIENCE
    public static $SQL_CREATE_EXPERIENCE = "insert into experience (client, description, taches, ville, poste, projet, debut, fin, envtech, idcv) values (:client, :description, :taches, :ville, :poste, :projet, :debut, :fin, :envtech, :idcv)";
    public static $SQL_SELECT_EXPERIENCES = "select id, client, description, taches, ville, poste, projet, debut, fin, envtech from experience where idcv = :idcv";
    public static $SQL_SELECT_EXPERIENCE_BY_ID = "select id, client, description, taches, ville, poste, projet, debut, fin, envtech from experience where idcv = :idcv and id = :idExperience";
    public static $SQL_UPDATE_EXPERIENCE = "update experience set client=:client, description=:description, taches=:taches, ville=:ville, poste=:poste, projet=:projet, debut=:debut, fin=:fin, envtech=:envtech where id=:id";
    public static $SQL_DELETE_EXPERIENCE = "delete from experience where id=:idExp";


    //FORMATION
    public static $SQL_CREATE_FORMATION = "insert into formation(organisme, annee, description, idcv) values (:organisme, :annee, :description, :idcv)";
    public static $SQL_SELECT_FORMATIONS = "select id, organisme, annee, description from formation where idcv = :idcv";
    public static $SQL_SELECT_FORMATION_BY_ID = "select id, organisme, annee, description from formation where idcv = :idcv and id = :idFormation";
    public static $SQL_DELETE_FORMATION = "delete from formation where id = :idFormation";
    public static $SQL_UPDATE_FORMATION = "update formation set organisme=:organisme, annee=:annee, description=:description where id=:idFormation";

    //LANGUE
    public static $SQL_CREATE_LANGUE = "insert into langue(libelle, niveau, idcv) values (:libelle, :niveau, :idcv)";
    public static $SQL_SELECT_LANGUES = "select id, libelle, niveau from langue where idcv = :idcv";
    public static $SQL_SELECT_LANGUE_BY_ID = "select id, libelle, niveau from langue where idcv = :idcv and id = :idLangue";
    
    // USER
    public static $SQL_SELECT_USER = "select id, name, login, idprofile from user where login = :login and mdp = :password";

    // COMPETENCES FONCTIONNELLES
    public static $SQL_SELECT_COMPETENCES_FONCTIONNELLES = "select id, libelle, description from competences_fonctionnelles where idcv = :idcv";
    public static $SQL_CREATE_COMPETENCE_FONCTIONNELLE = "insert into competences_fonctionnelles (libelle, description, idcv) values (:libelle, :description, :idcv)";
    public static $SQL_SELECT_COMPETENCE_FONCTIONNELLE = "select id, libelle, description from competences_fonctionnelles where idcv = :idcv and id = :idCompFonct";
    public static $SQL_DELETE_COMPETENCE_FONCTIONNELLE = "delete from competences_fonctionnelles where id=:idExprFonct";
    public static $SQL_UPDATE_COMPETENCE_FONCTIONNELLE = "update competences_fonctionnelles set libelle=:libelle, description=:description where id=:idExprFonct";

}
?>