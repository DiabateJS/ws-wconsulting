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
    public static $SQL_CREATE_CV = "insert into cv (titre, poste, annee, dispo, intro, userid) values (:titre, :poste, :annee, :dispo, :intro, :userid)";
    public static $SQL_ALL_CV = "select c.id, c.titre, c.poste, c.annee, c.dispo, c.intro, c.userid, u.name from cv c, user u where c.userid = u.id";
    public static $SQL_CV_BY_ID = "select c.id, c.titre, c.poste, c.annee, c.dispo, c.intro, c.userid, u.name from cv c, user u where c.userid = u.id and c.id = :id";
}
?>