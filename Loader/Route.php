<?php
namespace Loader;

use \Config\Config;

class Route {
    private array $route;
    private static $instance;
    private function __construct(){

    $this->route = Config::getRoutes();
    }
    public static function getInstance(): Route

    {
        echo 2;
        if((self::$instance===null)) {
            echo 3;
            self::$instance = new Route();
        }
        return self::$instance;
    }
    public  function init(): void
    {
            echo " Route::init 1";
            #$uri=$_SERVER["REQUEST_URI"];
            #$uri="https://localhost/PHP-OOP/index?controller=/Controller/HomeController&action=index";
            $uri="/?controller=/Controller/HomeController&action=index";
            $segment =$uri;
            if(strpos($uri,"?"))
            {
                $segment=explode("?",$uri)[0];
            }
            $segment=trim($segment, "/");
            #$reqmethod=$_SERVER["REQUEST_METHOD"];
            $reqmethod="GET";
            if(!isset($this->route[$reqmethod])){
            #if(!isset($this->route[$_SERVER["GET"]])){
                echo " 404 Not Found \n";
            }
            #echo $this->route["GET"];
            #$routes=$this->route[$_SERVER["REQUEST_METHOD"]];
            $routes=$this->route[$reqmethod];
            for ($i=0, $count=count($routes); $i < $count; $i++) {
                if(preg_match("#^".$routes[$i]["uri"]."$#",$segment)){
                    $params=$routes[$i]['params'];
                    if(strpos($params, "$")!==false){
                        $params=preg_replace("#^".$routes[$i]["uri"]."$#",$params,$segment);
                        $params=explode("/",$params);
                    } else{
                        $params=[];
                    }
                    $class = $routes[$i]["controller"];
                    $controller = new $class();
                    if(!method_exists($controller,$routes[$i]["action"])){
                        // show404
                        echo " 404 ";
                    }
                    call_user_func_array([$controller,$routes[$i]["action"]],$params);
                }
            }
    }

}


