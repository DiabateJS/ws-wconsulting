<?php
include "utils/Constants.class.php";
include "utils/RequestParsing.class.php";
include "controllers/CvController.class.php";

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

$cvController = new CvController($queryStringDico);
echo $cvController->getView();
?>