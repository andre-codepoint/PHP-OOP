<?php

namespace Config;
class Config {
    private function __construct(){

    }
    public static function getRoutes (): array
    {
        return [
            "GET"=>[
                [
                    "uri"=>"",
                    "controller"=>"\\Controller\\HomeController",
                    "action"=>"index",
                    "params" =>"",
                ],
            ]
        ];
    }

}