<?php

class KTemplateMaker
{

    private $valNotifyer;
    private $templateDirPath;
    function __construct( $templateDirPath,$valNotifyer = "**")
    {
        $this->valNotifyer = $valNotifyer;
        $this->templateDirPath = $templateDirPath;
    }


    function makeTemplate($templatePath,$settingsArr)
    {
        try
        {
            $viewContents =   file_get_contents($this->templateDirPath.$templatePath);

            $result = $viewContents;

            foreach($settingsArr as $k=>$v)
            {
                $neeedle = $this->valNotifyer.$k.$this->valNotifyer;
                $haystack = $result; 
                $variable = is_array($v)?json_encode($v):$v;
              
                $result = str_replace($neeedle,$variable,$haystack);
            }

            echo $result;
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }
    }
}