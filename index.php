<?php
include "utils/Constants.class.php";
include "utils/RequestParsing.class.php";
include "controllers/CvController.class.php";
include "./controllers/ExperienceController.class.php";

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
if (count($tab_route) == 2 && $tab_route[0] == "cvs"){
    $controller = new CvController($queryStringDico);
}
if (count($tab_route) == 4 && $tab_route[2] == "experiences"){
    $controller = new ExperienceController($queryStringDico);
}

if ($controller != null){
    echo $controller->getView();
}

?>