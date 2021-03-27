<?php

namespace kThemeUtilities;


class KOptionManager
{

    private $settingGroupMap;



    public function __construct()
    {
        $this->settingGroupMap = [];
    }

    public function configureSettingGroup($group,$settingsArr)
    {
        $this->settingGroupMap[$group] = $settingsArr;
    }

    public function configureSetting($group,$key,$value)
    {
        $groupSettings = $this->getGroupSettings($group);
        $groupSettings[$key] = $value;
    }

    public function getGroupSettings($group)
    {
       $groupExists =  key_exists($group, $this->settingGroupMap);
   
       if(!$groupExists)
       { 
            $this->settingGroupMap[$group] = [];
            $encoded = get_option($group);

            $this->settingGroupMap[$group]  = json_decode($encoded);

       }

       $result =  $this->settingGroupMap[$group]??[];

       return $result;
    }

    public function saveGroupSettings($group)
    {

        try 
        {
            $settingsToSave  = $this->getGroupSettings($group);

            delete_option($group);
            $encoded = json_encode($settingsToSave);
            add_option($group,$encoded);    
            $status = ["status"=>"updated"];
    
            $result = array_merge($status,$settingsToSave);
    
            return $result;
        } catch (\Throwable $th)
         {
            throw $th;

        }

      


    }


}