<?php 
$currentDirectory = dirname(__FILE__);
foreach (scandir($currentDirectory) as $filename)
 {
   


    $path = $currentDirectory . '/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
