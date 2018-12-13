<?php

require "core/PathAnalyzer.php";
   
$pathObject = new PathAnalyzer();

$isPathValid = $pathObject->getValid();

if ($isPathValid) {
    $path = $pathObject->getPath();
} else {
    require "template/error.php";
}

var_dump($path);

var_dump(count($path));
