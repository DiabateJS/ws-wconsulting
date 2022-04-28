<?php
include "../utils/QueryStringParse.php";

class TestQueryStringParse {

    public function shouldParseQueryIsCorrect(){
        $server = array(
            Constants::$QUERY_STRING => "param1=un&param2=deux"
        );
        $queryParse = QueryStringParse::parseQuery($server);
        $isArray = is_array($queryParse);
        $containParam1 = array_key_exists("param1", $queryParse);
        $containParam2 = array_key_exists("param1", $queryParse);
        $result = $isArray && $containParam1 && $containParam2;
        return $result;
    }
    
}
?>