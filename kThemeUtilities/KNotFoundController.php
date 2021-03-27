<?php

namespace kThemeUtilities;

require_once dirname(__FILE__)."/KThemeInfo.php";
require_once dirname(__FILE__)."/KThemeController.php";

 class KNotFoundController extends KThemeController
{

    public function getData()
    {
        return ["NoData"=>"Whatever you were looking for. I didn't find it"];
    }

    public  function execute()
    {
        echo "<h1>Whatever you were looking for. I didn't find it</h1>";

    }


}