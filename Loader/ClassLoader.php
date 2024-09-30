<?php

namespace Loader;
class ClassLoader
{

    private static  $instance;

    function __construct()
    {
    }

    public static function getInstance(): ClassLoader
    {
echo 1;
            if (self::$instance === null) {
            self::$instance = new ClassLoader();
        }

        return self::$instance;
    }

    public function init(): void
    {
        spl_autoload_register([self::$instance, "load"]);
    }
    public function load($name): void
    {
        echo '$_SERVER["DOCUMENT_ROOT"]='.$_SERVER["DOCUMENT_ROOT"] . "/" . str_replace("\\", "/", $name) . ".php";
        $docPath=$_SERVER["DOCUMENT_ROOT"] .  str_replace("\\", "/", $name) . ".php";
        include_once($docPath);
    }
}