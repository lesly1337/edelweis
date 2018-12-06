<?php

require "core/PathAnalyzer.php";
   
$pathObject = new PathAnalyzer();

$path = $pathObject->getPath();

var_dump($path);