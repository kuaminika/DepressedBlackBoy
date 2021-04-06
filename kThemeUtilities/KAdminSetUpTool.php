<?php

namespace kThemeUtilities;

require_once dirname(__FILE__)."/KScriptManager.php";
require_once dirname(__FILE__)."/KThemeInfo.php";

abstract class KAdminSetUpTool
{
    protected $themeSettings;

    public function __construct(KThemeInfo $kThemeInfo)
    {
        $this->themeSettings = $kThemeInfo;      
    }

    public abstract function setItUp();
}