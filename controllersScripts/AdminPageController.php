<?php 

namespace controllerScripts;

require_once dirname(__DIR__)."/kThemeUtilities/KThemeController.php";

use kThemeUtilities\KThemeController;

class AdminPageController extends KThemeController
{


    public function getSettingsSetByName($settingsName)
    {
       try 
       {
            $settingsTool = $this->themeSettings->getSettingsTool();
            $result = $settingsTool->getGroupSettings($settingsName);
            echo json_encode($result);
       } 
       catch (\Throwable $err) 
       {
        $this->echoErrorInJSON($err);
           
       }
    }


    public function recordContactAdmin($settings)
    {
        try 
        {
            $itHasSettingsName = key_exists("settingsName",$settings);
            if(!$itHasSettingsName) throw new  \Exception("Error Processing Request:settingsName key needed", 1);
            
            $settingsName = $settings["settingsName"];       
        
            $settingsTool = $this->themeSettings->getSettingsTool();
        
            $settingsTool->configureSettingGroup($settingsName,$settings);
            $result = $settingsTool->saveGroupSettings($settingsName);
            echo json_encode($result);
            
        } 
        catch (\Throwable $err) 
        {
            $this->echoErrorInJSON($err);
        }
    }

    public function execute()
    {
        $blankSettings= ["siteUrl"=>$this->themeSettings->siteUrl
                        ,"adminAPINamespace"=>$this->themeSettings->adminAPINamespace
                        ,"themeAdminPageSlug"=>$this->themeSettings->themeAdminPageSlug
                        ,"adminFormFields"=>$this->themeSettings->adminFormFields
                    ];
        echo $this->tmplateMkr->makeTemplate('/templates/admin_template.html',$blankSettings );
    }
}