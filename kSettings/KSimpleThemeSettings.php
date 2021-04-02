<?php 


use controllerScripts\ControllerBuilder;
use kThemeUtilities\KThemeInfo;
use kThemeUtilities\KConfigSet;
use kThemeUtilities\BrowserInfo;
use kThemeUtilities\KTemplateMaker;
class KSimpleThemeSettings extends KThemeInfo
{
    public $adminSettingsName;
    public function __construct(KConfigSet $kConfigSet,BrowserInfo $browserInfo, KTemplateMaker $kTemplateMaker)
    {
        parent::__construct($kConfigSet,$browserInfo,$kTemplateMaker);

        $this->adminSettingsName = $kConfigSet->getConfig("adminSettingsName");


    }

    public function getCotnrollerBuilderForAPI($lang = null)
    {
        $lang = $lang ?? $this->browserInfo->getLanguage();
        $this->controllerBuilder = new ControllerBuilder($this,$lang);
        $initial = new \kThemeUtilities\KNotFoundController($this,$lang);
        $this->controllerBuilder->setInitial($initial);
        return   $this->controllerBuilder;
    }
}