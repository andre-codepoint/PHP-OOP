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
        include_once($_SERVER["DOCUMENT_ROOT"] . "/" . str_replace("\\", "/", $name) . ".php");
    }
}