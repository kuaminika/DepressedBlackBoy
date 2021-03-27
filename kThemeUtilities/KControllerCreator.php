<?php

namespace kThemeUtilities;

require_once dirname(__FILE__)."/KNotFoundController.php";
require_once dirname(__FILE__)."/KThemeInfo.php";


abstract class KControllerCreator
{
   
    protected $inTheMakeing; 
    public function __construct(KThemeInfo $kThemeInfo,$lang)
    {
        $this->inTheMakeing = new \kThemeUtilities\KNotFoundController($kThemeInfo,$lang);
    }

    public function setInitial($initController)
    {
        $this->inTheMakeing = $initController;

    }
    public function findController($controllerNamePath)
    {
        if($controllerNamePath == "controllerScripts\All")
        {
            $result = $this->getFull();
            return $result;
        }

        $fullPath = $controllerNamePath."PageController";

        $controllerExists = class_exists($fullPath);
        $initialController = $this->inTheMakeing;


        if($controllerNamePath == "controllerScripts\Home")
        {
            $initialController = new  $fullPath( $this->themeSettings);
            return $initialController;
        }

        if(!$controllerExists) return  $initialController;
      
        $result = new $fullPath( $initialController);
        return $result;
    }
    public abstract function getFull();
}