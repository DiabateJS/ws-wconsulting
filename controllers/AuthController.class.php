<?php
include "../utils/Constants.class.php";
include dirname(__DIR__)."/models/User.class.php";
include dirname(__DIR__)."/models/UserManager.class.php";

class AuthController {
    private $dico;
    private $method;
    private $url;
    private $route_info;

    function __construct($paramDico)
    {
        $this->dico = $paramDico;
        $this->method = $paramDico["method"];
        $this->url = $paramDico["url"];
        $this->route_info = $paramDico["route_info"];    
    }

    public function getAll(){
        $response = Constants::$DEFAULT_RESPONSE;
        return $response;
    }

    public function getById(){
        $response = Constants::$DEFAULT_RESPONSE;
        return $response;
    }

    public function create(){
        $response = Constants::$DEFAULT_RESPONSE;
        return $response;
    }

    public function update(){
        if ($this->method == Constants::$PUT){

        }
    }

    public function delete(){
        if ($this->method == Constants::$DELETE){

        }
    }

    public function getView(){
        $json = "";
        if ( count($this->route_info) == 2 &&  $this->route_info[0] == "auth"
             && trim($this->route_info[1]) == "" ){
            if ( $this->method == Constants::$POST ){
                $user = new User($this->dico["login"], $this->dico["password"]);
                $userManager = new UserManager();
                $json = json_encode($userManager->auth($user));
            }
        }

        return $json;
    }

} 
?>