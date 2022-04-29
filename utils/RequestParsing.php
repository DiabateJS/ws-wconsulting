<?php
include "./Constants.php";

class RequestParsing {
    public static function parseQuery($ServerData){
        $query = $ServerData[Constants::$QUERY_STRING];
        $tab = explode(Constants::$PARAMS_SEPARATOR,$query);
        $res = array();
        for ($i = 0 ; $i < count($tab) ; $i++){
            $keyValue = explode(Constants::$KEY_VALUE_SEPARATOR,$tab[$i]);
            $key = $keyValue[0];
            $value = $keyValue[1];
            $res[$key] = $value;
        }
        return $res;
    }

    public static function getRequestMethod($ServerData){
        return $ServerData[Constants::$REQUEST_METHOD];
    }
}

?>