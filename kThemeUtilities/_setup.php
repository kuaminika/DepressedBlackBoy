<?php


use kThemeUtilities\BrowserInfo;
use kThemeUtilities\KConfigSet;
use kThemeUtilities\KTemplateMaker;


function getBrowserInfo()
{
    $binfo = new BrowserInfo();
    return $binfo;

}



function getThemeSettings()
{
    global $configsArr;
    
    $configs = KConfigSet::createNewConfigs($configsArr);
    $kTemplateMaker = new KTemplateMaker($configs->getConfig("templatesDirectory"));
    
    $binfo = new BrowserInfo();
    $settings = new KSimpleThemeSettings($configs,$binfo ,$kTemplateMaker);
    return $settings;
}


function setupAPI()
{
    $themeSettings = getThemeSettings();
    $kpiTool = new \kThemeUtilities\KAPITool($themeSettings);
    $kpiTool->setUp();
}

?>