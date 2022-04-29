<?php
class Constants {
    //Constants for request parsing
    public static $QUERY_STRING = "QUERY_STRING";
    public static $REQUEST_METHOD ="REQUEST_METHOD";
    public static $PARAMS_SEPARATOR = "&";
    public static $KEY_VALUE_SEPARATOR = "=";

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
}
?>