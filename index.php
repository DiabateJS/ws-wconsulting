<?php
include "utils/Constants.class.php";
include "utils/RequestParsing.class.php";
include "controllers/CvController.class.php";
include "./controllers/ExperienceController.class.php";
include "./controllers/FormationController.class.php";
include "./controllers/LangueController.class.php";
include "./controllers/CompetencesController.class.php";
include "./controllers/CompetenceFonctionnelleController.class.php";
include "./controllers/AuthController.class.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$queryMethod = RequestParsing::getRequestMethod($_SERVER);
$queryStringDico = RequestParsing::parseQuery($_SERVER);

$queryStringDico["route_info"] = RequestParsing::urlParsing($queryStringDico["url"]);

if ($queryMethod == Constants::$GET){
    $queryStringDico[Constants::$GET] = $_GET;
}
if ($queryMethod == Constants::$POST){
    $queryStringDico[Constants::$POST] = $_POST;
}
if ($queryMethod == Constants::$PUT){
    parse_str(file_get_contents('php://input'), $queryStringDico[Constants::$PUT]);
}
if ($queryMethod == Constants::$DELETE){
    parse_str(file_get_contents('php://input'), $queryStringDico[Constants::$DELETE]);
}

$tab_route = $queryStringDico["route_info"];
$controller = null;
if (count($tab_route) == 2 && $tab_route[0] == "auth"){
    $controller = new AuthController($queryStringDico);
}
if (count($tab_route) == 2 && $tab_route[0] == "cvs"){
    $controller = new CvController($queryStringDico);
}
if (count($tab_route) == 2 && $tab_route[0] == "competences"){
    $controller = new CompetencesController($queryStringDico);
}
if (count($tab_route) == 4 && $tab_route[2] == "experiences"){
    $controller = new ExperienceController($queryStringDico);
}
if (count($tab_route) == 4 && $tab_route[2] == "formations"){
    $controller = new FormationController($queryStringDico);
}
if (count($tab_route) == 4 && $tab_route[2] == "langues"){
    $controller = new LangueController($queryStringDico);
}
if (count($tab_route) == 4 && $tab_route[2] == "competences_fonctionnelles"){
    $controller = new CompetenceFonctionnelleController($queryStringDico);
}

if ($controller != null){
    echo $controller->getView();
}

?>