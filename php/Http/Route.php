<?php

class Router{

    private $argLList = array();

    /**
     * Get an instance of the request class.
     * @return Request
     */
    public function getRequest(){
        return new Request();
    }

    /**
     * Get request from client to server
     * @param $route
     * @param $method
     */
    public function get($route, $method){
        $this->{"get"}[$this->formatRoute($route)] = $method;
    }

    /**
     * Post request from client to server
     * @param $route
     * @param $method
     */
    public function post($route, $method){
        $this->{"post"}[$this->formatRoute($route)] =$method;
    }

    public function formatUri($uri){
        $result = rtrim($uri,"/");
        if($result === ""){
            return "/";
        }
        return $result;
    }

    public function formatRoute($route){
        $result = rtrim($route,"/");
        if($result === ""){
            return "/";
        }
        $newRoute = "";
        $processResult = explode("/",$result);
        $uri = explode("/", $this->getRequest()->requestUri);
        for($i = 0; $i < count($processResult); $i++){
            if ($processResult[$i] === $uri[$i]){
                if(array_key_last($processResult) === $i){
                    $newRoute .= $processResult[$i];
                }else{
                    $newRoute .= $processResult[$i]."/";
                }
            }
            if(stristr($processResult[$i],"{")){
                if(array_key_last($processResult) === $i){
                    $newRoute .= $uri[$i];
//
                }else{
                    $newRoute .= $uri[$i]."/";
                }
                $this->argLList[substr($processResult[$i],1,strpos($processResult[$i],"}")-1)]=$uri[$i];

            }
        }
        return $newRoute;
    }
//
    public function invalidMethodHandler(){
        header($this->request->serverProtocol."405 Method Not Allowed", true, 404);
    }

    public function defaultRequestHandler(){
        echo json_encode("404 Method Not Found");
        exit;
    }

    /**
     * @throws ReflectionException
     */
    public function resolve(){
        $methodDictionary = $this->{strtolower($this->getRequest()->requestMethod)};
        $formattedRoute = $this->formatUri($this->getRequest()->requestUri);
        $method = $methodDictionary[$formattedRoute];
        $methodName = explode("@",$method);

        if (is_null($methodName[1])){
            $this->defaultRequestHandler();
            return ;
        }
        if(is_subclass_of($methodName[0], 'ParentClass')){
            $controllerClass = new $methodName[0]();
            $refMethod = new ReflectionMethod($controllerClass,$methodName[1]);
            $argsArray =array();
            foreach ($refMethod->getParameters() as $arg){
                if ($arg->getType() == get_class($this->getRequest())){
                    $argsArray[$arg->name] = $this->getRequest();
                }else{
                    $argsArray[$arg->name] = $this->argLList[$arg->name];
                }
            }

            echo call_user_func_array(array($controllerClass,$methodName[1]), $argsArray);
        }else{
            echo trigger_error("Error: function class must extend controller.");
        }
    }

    function __destruct(){
        $this->resolve();
    }
}