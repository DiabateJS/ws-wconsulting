<?php
include "utils/QueryStringParse.php";

$queryStringDico = QueryStringParse::parseQuery($_SERVER);
print_r($queryStringDico);
?>