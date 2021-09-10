<?php
require ('RequestInterface.php');

class Request implements RequestInterface{

    function __construct(){
        return $this->bootstrapSelf();
    }

    public function bootstrapSelf(){

        foreach ($_SERVER as $key => $value){
            $this->{$this->toCamelCase($key)} = $value;
//            echo $key. " => ".$value." <br> ";
        }
    }

    public function toCamelCase($result){
        $result = strtolower($result);
        preg_match_all('/_[a-z]/', $result, $matches);

        foreach ($matches[0] as $match){
            $c = str_replace('_','', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }
    public function getBody()
    {
        if($this->requestMethod === 'GET'){
            return;
        }

        if ($this->requestMethod == "POST"){
            $body = array();
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
            return $body;
        }
    }

    public function input($name){
        if($this->requestMethod === "POST"){
            return $_POST[$name];
        }
        return trigger_error("Invalid method call. Input is for POST requests");
    }
}