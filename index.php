<?php
include "utils/Constants.php";
include "utils/RequestParsing.php";

$queryMethod = RequestParsing::getRequestMethod($_SERVER);
echo "Method : ".$queryMethod."<br>";
$queryStringDico = RequestParsing::parseQuery($_SERVER);
echo "Query String Dico <br>";
print_r($queryStringDico);

if ($queryMethod == Constants::$GET){
    echo Constants::$GET;
}
if ($queryMethod == Constants::$POST){
    echo Constants::$POST;
}
if ($queryMethod == Constants::$PUT){
    echo Constants::$PUT;
}
if ($queryMethod == Constants::$DELETE){
    echo Constants::$DELETE;
}
?>