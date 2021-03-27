<?php 


use controllerScripts\ControllerBuilder;
use kThemeUtilities\KThemeInfo;
class DBlackBoySettings extends KThemeInfo
{
    public function getCotnrollerBuilderForAPI($lang = null)
    {
        $lang = $lang ?? $this->browserInfo->getLanguage();
        $this->controllerBuilder = new ControllerBuilder($this,$lang);
        $initial = new \kThemeUtilities\KNotFoundController($this,$lang);
        $this->controllerBuilder->setInitial($initial);
        return   $this->controllerBuilder;
    }
}