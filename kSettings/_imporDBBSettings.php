<?php 

foreach (scandir(dirname(__FILE__)) as $filename)
 {
     $dontImportprefix = "_";
    $position = strrpos($filename,$dontImportprefix);
     $shouldNOtImport =   $position >-1;
     if($shouldNOtImport)
     { 
         continue;
     }
    $path = dirname(__FILE__) . '/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}

