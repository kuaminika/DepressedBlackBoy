
<?php 


class DBBAdminTool extends \kThemeUtilities\KAdminSetUpTool
{


    function setUpAPIThings()
    {
        add_action("rest_api_init",function()
        {
            $themeSettings = getThemeSettings();
        
            register_rest_route($themeSettings->adminAPINamespace, $themeSettings->themeAdminPageSlug."_kAdminSetUp/(?P<settingName>[a-z]+)",array(
                
                "methods"=>"GET",
                "callback"=>function($data)
                {                
                    $settingName =  $data["settingName"];
               
            
                    $themeSettings = getThemeSettings();
                    $adminPageController = new \controllerScripts\AdminPageController($themeSettings);
                    
                    $adminPageController->getSettingsSetByName($settingName);
                }
            
            ));

            register_rest_route($themeSettings->adminAPINamespace, $themeSettings->themeAdminPageSlug."_kAdminSetUp",array(
                
                "methods"=>"POST",
                "callback"=>function($data)
                {                    
                    $received = $data->get_params();
                    $data = $received ;
                    if(!is_array($data)) return;
                    $themeSettings = getThemeSettings();
                    $adminPageController = new \controllerScripts\AdminPageController($themeSettings);
                    
                    $adminPageController->recordContactAdmin($data);
                }
            
            ));
        });
        
    }

    public function setItUp()
    {            
        add_action('admin_menu', function() {
            $themeSettings = getThemeSettings();
           add_menu_page( $themeSettings->themeAdminPageTitle, $themeSettings->themeAdminPageTitle, 'unfiltered_html', $themeSettings->themeAdminPageSlug, function()use(&$themeSettings)
            {      
                $adminPageController = new \controllerScripts\AdminPageController($themeSettings);
               $adminPageController->execute();       
           
            });
            $editorRole = get_role( 'editor' );            
            $editorRole->add_cap( 'unfiltered_html' );          
            
        },10);

        add_option("testOption","testValue");
        
        add_action('admin_head',function(){
            $themeSettings = getThemeSettings();
            $scriptManager = $themeSettings->getScriptManager();
            $scriptManager->addStyleScript("bootstrap.min.css");
            $scriptManager->addStyleScript("admin.css");
			
           // $scriptManager->addJSScript("twig.js","twig.js/src"); 
            $scriptManager->addVendorJSScript("axios.min.js");   
            $scriptManager->addVendorJSScript("twig.js");   
         //C:\Users\leman\AppData\Roaming\Notepad++\plugins\Config\NppFTP\Cache\kuaminika@cybereq.com@ftp.cybereq.com\public_html\kuaminikaWorkspace\heartmindequation.com\wp-content\themes\HeartMindEquation\js\twig.js\src\twig.js
            $scriptManager->addJSScript("KLIB.js","KLIBJS"); 
            $scriptManager->addJSScript("KCourrier.js","KLIBJS");  
            $scriptManager->addJSScript("KClassTool.js","KLIBJS");  
            $scriptManager->addJSScript("KForm.js","KLIBJS");    
            $scriptManager->addJSScript("admin.js");    
        });


        
        add_action( 'admin_init', function()
        {
            //adding section
            $themeSettings = getThemeSettings();
            $sectionId = $themeSettings->themeAdminPageSlug;//."kAdminSection";
            add_settings_section($sectionId,// id
                                $themeSettings->themeAdminPageTitle, // title
                                function(){ 
                                }, $themeSettings->themeAdminPageTitle);


            //adding field
            $fieldId = "testField";
            $themeSettings = $themeSettings;
            $id = $themeSettings->themeAdminPageSlug.$fieldId;
            $title = "field-".$fieldId;
            $page =  $themeSettings->themeAdminPageTitle;
            $args = [];/*
            add_settings_field( $id, $title, function(){
                ?>
                <input type="text" name="txtChannelName" id="txtChannelName" />
                <?php
    
            }, $page,  $sectionId, $args );*/

            register_setting($sectionId,$fieldId);
        });

        $this->setUpAPIThings();

    }
}