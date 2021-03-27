<?php

namespace kThemeUtilities;

require_once dirname(__FILE__)."/KThemeInfo.php";

abstract class KThemeController
{

    protected $themeSettings; 
    public $lang;

    public function __construct(KThemeInfo $kThemeInfo,$lang = "en")
    {
        $this->themeSettings = $kThemeInfo;
        $this->lang = $lang;      
    }

    public function getThemeSettings()
    {
        return $this->themeSettings;
    }

    public function echoErrorInJSON($error)
    {
           
        $status = ["status"=>"error"];
        $result = array_merge($status,(array)$error);
        echo json_encode($result);

    }

    public function getData()
    {
        return [];
    }

    
    public function executeAll()
    {
       $this->execute();
    }

    public  function getAlldata()
    {
        $phrase =  get_class($this);
        $healthy = ["controllerScripts\\","PageController"];
        $yummy = ["",""];
        $dataSlug = str_replace($healthy, $yummy, $phrase);
      return [$dataSlug => $this->getData()];
    }
    public abstract function execute();

}