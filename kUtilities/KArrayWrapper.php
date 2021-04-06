<?php 
namespace KUtilities;

use Exception;

class KArrayWrapper
{
    private $array;
    private $defaultMode;
    private $MISSING_KEY_MSG  = "array is missing a key";

    public function __construct($array,$defaultMode = false)
    {
        $this->array = $array;
        $this->defaultMode = $defaultMode; 
    }

    public function get($key,$defaultStrValue = "")
    {
        try
        {

            if(!array_key_exists($key,$this->array))
            {
                throw   new \Exception("cannot find key '".$key."' in this array ");
            }
            $result = $this->array[$key];
            return $result;
        }
        catch(\Exception $ex)
        {
            if($this->defaultMode)
            {
                return $defaultStrValue;
            }
            throw $this->MISSING_KEY_MSG ."==>".$ex;
        }
    }

    public function getInt($key,$defaultIntValue = 0  )
    {
        try
        {
            $result = $this->array[$key];
            return $result;
        }
        catch(\Exception $ex)
        {
            if($this->defaultMode)
            {
                return $defaultIntValue;
            }
            throw $this->MISSING_KEY_MSG ."==>".$ex;
        }     
    }


}