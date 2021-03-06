<?php
include '../utils/RequestParsing.class.php';

class TestRequestParsing {

    public function shouldParseQueryIsCorrect(){
        $queryParse = RequestParsing::parseQuery(Constants::$SERVER_QUERY_STRING_WITH_2_PARAMS);
        $isArray = is_array($queryParse);
        $containParam1 = array_key_exists("param1", $queryParse);
        $containParam2 = array_key_exists("param1", $queryParse);
        $result = $isArray && $containParam1 && $containParam2;
        return $result;
    }

    public function shouldGetRequestMethodIsCorrect(){

        $post_res = RequestParsing::getRequestMethod(Constants::$SERVER_POST_REQUEST);
        $result1 = $post_res == Constants::$POST;

        $get_res = RequestParsing::getRequestMethod(Constants::$SERVER_GET_REQUEST);
        $result2 = $get_res == Constants::$GET;

        return $result1 && $result2;
    }

    public function shouldUrlParsingIsCorrect(){

        $url_cvs = "cvs/";
        $cvs_res = RequestParsing::urlParsing($url_cvs);
        $result1 = count($cvs_res) <= 2;

        $url_langues_cvs = "cvs/1/langues/1";
        $langues_cvs_res = RequestParsing::urlParsing($url_langues_cvs);
        $result2 = count($langues_cvs_res) == 4;

        return $result1 && $result2;
    }

}
?>