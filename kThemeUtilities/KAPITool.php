<?php

namespace kThemeUtilities;

require_once dirname(__FILE__)."/KThemeInfo.php";
require_once dirname(__FILE__)."/KNotFoundController.php";

class KAPITool
{
    private $themeSettings;

    function __construct(KThemeInfo $kThemeInfo)
    {
        $this->themeSettings = $kThemeInfo;
    }


    public function setUp()
    {
       
        add_shortcode( "tem_page", function($atts, $content = "" ){
        
            $data = $atts;
            $controllerPageName =  $data["page"];
            $themeSettings = getThemeSettings();
            $lang =  $themeSettings->getLanguage();
            $controllerPagePath = $themeSettings->controllerPagePath."\\".$controllerPageName;
        
            $controller = $this->findController($controllerPagePath,$lang);
            $controller->execute();
        });

        add_action("rest_api_init",function()
        {
            $themeSettings = getThemeSettings();
            register_rest_route($themeSettings->adminAPINamespace, $themeSettings->themeAdminPageSlug."/(?P<controllerPageName>[a-z]+)/?(?P<lang>[a-z]+)?",array(
                    
                "methods"=>"GET",
                "callback"=>function($data)
                {            

                    $controllerPageName =  $data["controllerPageName"];
                    $lang = $data["lang"];
                    $themeSettings = getThemeSettings();
                    $controllerPagePath = $themeSettings->controllerPagePath."\\".$controllerPageName;
                  $this->doJSONGet($controllerPagePath,$lang);
                }
            
            ));
        });
    }

    private function findController($controllerNamePath,$lang)
    {
        $cBuilder = $this->themeSettings->getCotnrollerBuilderForAPI($lang);
        $result = $cBuilder->findController($controllerNamePath);
        return $result;
    }

    
    public function doJSONGet($controllerNamePath,$lang)
    {   

        $controller = $this->findController($controllerNamePath,$lang);

        $rawResult =(array) $controller->getAllData();        
        $result = json_encode($rawResult);
        echo  $result;        
    }
}
