<?php

class PathAnalyzer {

    private $url;
    private $path;

    function __construct() {
        $this->url = $this->setUrl();
        $this->path = $this->setPath();
    }

    private function setUrl() {
        return $_GET['path'];
    }

    private function setPath() {
        return explode('/', $this->url);
    }

    public function getPath() {
        return $this->path;

    }
   
}