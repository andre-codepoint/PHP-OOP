<?php

namespace Controller;

class Controller {

    private array $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function loadModel($title) {

    }

    protected function data($variable, $data): void
    {
        $this->data[$variable] = $data;
    }

    protected function display($title): void
    {
        foreach($this->data as $variable => $data) {
            $$variable = $data;
        }

        include_once($_SERVER["DOCUMENT_ROOT"] . "/View/" . $title . ".php");
    }
}