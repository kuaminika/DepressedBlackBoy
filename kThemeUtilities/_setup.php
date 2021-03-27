<?php


use kThemeUtilities\BrowserInfo;
use kThemeUtilities\KConfigSet;


function getBrowserInfo()
{
    $binfo = new BrowserInfo();
    return $binfo;

}



function getThemeSettings()
{
    global $configsArr;
    
    $configs = KConfigSet::createNewConfigs($configsArr);
    
    $binfo = new BrowserInfo();
    $settings = new DBlackBoySettings($configs,$binfo );
    return $settings;
}


function setupAPI()
{
    $themeSettings = getThemeSettings();
    $kpiTool = new \kThemeUtilities\KAPITool($themeSettings);
    $kpiTool->setUp();
}

?>