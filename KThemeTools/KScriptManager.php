<?php
namespace KThemeTools;

class KScriptManager
{
    private $themePath;
    private $themeNamePrefix;
    

    public $versUpdateActivated;
    
    private function createBlankOptions()
    {
        $options = array("themePath"=>get_template_directory_uri(),
                          "themeNamePrefix"=>"Kscirpts"
        );        
        return $options;
    }
    
    function __construct($options)
    {
        if(!isset($options))
        {
            $options = $this->createBlankOptions();
        }
        $this->versUpdateActivated = true;
        $this->themePath = $options["themePath"];
        $this->themeNamePrefix = $options["themeNamePrefix"];
    }
    
    
    function getThemePath()
    {
        return $this->themePath;
    }
    
    function addVendorStyleScript($fileName,$path="")
    {
        $path = !empty($path)?"vendor/".$path."":"vendor";  
        $this->addStyleScript($fileName, $path);
    }
    
    function addStyleScript($fileName,$path="")
    {
        $path = !empty($path)?"css/".$path."/":"css/";
        
        $filePath =  $this->themePath."/".$path.$fileName;
        $style_ver =  $this->versUpdateActivated ? time():"";
        wp_enqueue_style( $this->themeNamePrefix.$fileName ,$filePath,array(),$style_ver);
        
    }    
    function getVendorStyleScript($fileName,$path="")
    {
        $path = !empty($path)?"css/vendor/".$path."":"vendor";
        return $this->getStyleScript($fileName, $path);
    }
    
    function getStyleScript($fileName,$path="")
    {
        $path = !empty($path)?$path."/":"css/";        
        $filePath =  $this->themePath."/".$path.$fileName;      
        return $filePath;        
    }
    

    function getVendorJSScript($fileName,$path="")
    {
        $path = !empty($path)?"js/vendor/".$path."/":"js/vendor/";
        return $this->getJSScript($fileName, $path);
    }
    
    function getJSScript($fileName,$path="")
    {
        $path = !empty($path)?$path."/":"js/";
        $style_ver =  $this->versUpdateActivated ? time():"";
        
        $filePath =  $this->themePath."/".$path.$fileName."?".$style_ver;
        return $filePath;        
    }    
    
    
    function addVendorJSScript($fileName,$path="")
    {
        $path = !empty($path)?"vendor/".$path."/":"vendor/";        
        $this->addJSScript($fileName, $path);
    }
    
    
   
    function addJSScript($fileName,$path="")
    {
        $path = !empty($path)?"js/".$path."/":"js/";
        
        $filePath =  $this->themePath."/".$path.$fileName;
        $style_ver =  $this->versUpdateActivated ? time():"";
        wp_enqueue_script( $this->themeNamePrefix.$fileName,$filePath,array(),$style_ver);
        
    }    
    
}

