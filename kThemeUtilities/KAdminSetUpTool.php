<?php

namespace kThemeUtilities;

require_once dirname(__FILE__)."/KScriptManager.php";
require_once dirname(__FILE__)."/KThemeInfo.php";

abstract class KAdminSetUpTool
{
    private $themeSettings;
    private $scriptManager;

    public function __construct(KThemeInfo $kThemeInfo)
    {
       // var_dump($kThemeInfo);
        $this->themeSettings = $kThemeInfo;
        $this->scriptManager = $kThemeInfo->getScriptManager();        
    }

    public abstract function setItUp();
}