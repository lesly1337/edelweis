<?php

class PathAnalyzer {

    private $url;
    private $path;
    private $isValid;

    function __construct() {
        $this->url = $this->setUrl();

        if ($this->url !== NULL) {
            $path = $this->setPath();
            $this->path = $this->cleanPath($path);
        }    

        $this->isValid = $this->checkPath();
    }

    private function setUrl() {
        return $_GET["path"];
    }

    private function setPath() {
        return explode("/", $this->url);
    }

    private function cleanPath($path) {
        $last = count($path) - 1;
        if ($path[$last] == "") {
            unset($path[$last]);
        }
        return $path;
    }

    private function checkPath() {
        return count($this->path) > 2 ? false : true;
    }

    public function getPath() {
        return $this->path;
    }
   
    public function getValid() {
        return $this->isValid;
    }

}
