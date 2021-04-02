<?php
namespace kThemeUtilities;

use KTemplateMaker;

// require_once dirname(__FILE__)."/KConfigSet.php";
// require_once dirname(__FILE__)."/TemplateMaker.php";
// require_once dirname(__FILE__)."/KScriptManager.php";
// require_once dirname(__FILE__)."/KOptionManager.php";

abstract class KThemeInfo
{


    public $siteUrl;
    public $mediaUrl;
    public $wp_mediaUrl;
    public $themeAdminPageTitle;
    public $themeAdminPageSlug;
    public $adminAPINamespace;
    public $adminFormFields;
    public $controllerPagePath;
    public $activeControllerLists;
    public $currentPageUrl;

    protected $browserInfo;
    protected $setUpToolHolder;
    protected $tmplateMkr;
    protected $settingsTool;
    protected $controllerBuilder;
    protected $kConfigSet;

    public function __construct(KConfigSet $kConfigSet,BrowserInfo $browserInfo, KTemplateMaker $kTemplateMaker)
    {
        $this->tmplateMkr = $kTemplateMaker;

        $this->kConfigSet = $kConfigSet;
        $this->currentPageUrl =  $kConfigSet->getConfig('currentPageUrl');
        $this->mediaUrl = $kConfigSet->getConfig("mediaUrl");   
        $this->wp_mediaUrl = $kConfigSet->getConfig("mediaUrl_wp");   
        $this->siteUrl = $kConfigSet->getConfig('siteUrl');
        $this->adminAPINamespace = $kConfigSet->getConfig('adminAPINamespace');
        $this->themeAdminPageTitle =  $kConfigSet->getConfig("themeAdminPageTitle") ;
        $this->themeAdminPageSlug = $kConfigSet->getConfig("themeAdminPageSlug");
        $this->adminFormFields = $kConfigSet->getConfig("adminFormFields");
        $this->browserInfo = $browserInfo;
        $this->controllerPagePath = $kConfigSet->getConfig("controllerPagePath");
        $this->activeControllerLists = [];
        $this->setUpToolHolder = [];     
    }


    public abstract function getCotnrollerBuilderForAPI($lang = null);

    public function getTemplateMaker()
    {
        return $this->tmplateMkr;
    }
    public function getLanguage()
    {

        $requestedLanguage = array_key_exists("lang",$_REQUEST)? $_REQUEST["lang"]:null;
        if(!in_array($requestedLanguage,["en","fr"]))
        {
            return "en";
        }
        $browserLang = $requestedLanguage ??  $this->browserInfo->getLanguage();

       $result =   $browserLang;
       return $result;
    }


    public function getSettingsTool()
    {
        $this->settingsTool = $this->settingsTool ?? new KOptionManager();
        return $this->settingsTool;
    }
    
  

    public function getScriptManager()
    {
        $options =  [];
        $options["themePath"] =$this->mediaUrl;
        $options["themeNamePrefix"] ="tem" ;
        
        $scriptManager = new KScriptManager($options);    
        
        return $scriptManager;
    }


}