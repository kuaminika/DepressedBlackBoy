<?php 

namespace controllerScripts;


class ContactPageController extends \kThemeUtilities\KThemeController
{


    
    public function getData()
    {

      $contactFieldNames = [];
      // $fieldGroupName = "Contact". ucfirst($this->lang);
      // $themeSettings = getThemeSettings();
      // $address_paris = $themeSettings->fetchVaue("TemPageBlock","address_paris",$this->lang);
      // $address_mtl = $themeSettings->fetchVaue("TemPageBlock","address_mtl",$this->lang);
      // $address_dakar = $themeSettings->fetchVaue("TemPageBlock","address_dakar",$this->lang);

      // $settingsTool  = $themeSettings->getSettingsTool($fieldGroupName);
      // $contactFieldNames =(array) $settingsTool->getGroupSettings($fieldGroupName);
      // $contactFieldNames["address_paris"] = $address_paris;
      // $contactFieldNames["address_dakar"] = $address_dakar;
      // $contactFieldNames["address_mtl"] = $address_mtl;
     
      // $addressSet=[];
      // $addressSet["address_paris"] = $address_paris;
      // $addressSet["address_dakar"] = $address_dakar;
      // $addressSet["address_mtl"] = $address_mtl;
      // $contactFieldNames["addressSet"]= $addressSet;

        return $contactFieldNames;
    }


    public function execute()
    {   
      $contactFieldNames = $this->getData();
       echo $this->tmplateMkr->makeTemplate('/templates/SectionTemplates/contact.html',$contactFieldNames );
    }


    
}