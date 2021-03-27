<?php 

namespace controllerScripts;

require_once dirname(__DIR__)."/kThemeUtilities/KNotFoundController.php";
require_once dirname(__DIR__)."/kThemeUtilities/KControllerCreator.php";
class ControllerBuilder extends \kThemeUtilities\KControllerCreator
{

    
    public function __construct(\DBlackBoySettings $kThemeInfo,$lang)
    {
        $this->inTheMakeing = new ContactPageController($kThemeInfo,$lang);
    }
    

    public function getFull() 
    {

        $allContrpllers = $this->inTheMakeing;


        return $allContrpllers;
    }

}