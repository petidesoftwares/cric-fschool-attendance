<?php

class Router{

    public function getRequest(){
        return new Request();
    }

    public function get($route, $method){
        $this->{"get"}[$this->formatRoute($route)] = $method;
    }
    public function post($route, $method){
        $this->{"post"}[$this->formatRoute($route)] =$method;
    }

    public function formatRoute($route){
        $result = rtrim($route,"/");
        if($result === ""){
            return "/";
        }
        return $result;
    }
//
    public function invalidMethodHandler(){
        header($this->request->serverProtocol."405 Method Not Allowed", true, 404);
    }

    public function defaultRequestHandler(){
        echo json_encode("404 Method Not Found");
        exit;
    }
    public function resolve(){
        $methodDictionary = $this->{strtolower($this->getRequest()->requestMethod)};
        $formattedRoute = $this->formatRoute($this->getRequest()->requestUri);
        $method = $methodDictionary[$formattedRoute];
        $methodName = explode("@",$method);

        if (is_null($methodName[1])){
            $this->defaultRequestHandler();
            return ;
        }
        if(is_subclass_of($methodName[0], 'Controller')){
            $controllerClass = new $methodName[0]();
            echo call_user_func_array(array($controllerClass,$methodName[1]), array($this->getRequest()));
        }
        echo trigger_error("Error: function class must extend controller.");
    }

    function __destruct(){
        $this->resolve();
    }
}