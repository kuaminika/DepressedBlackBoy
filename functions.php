<?php

require_once  dirname(__FILE__)."/kThemeUtilities/_importKthemeUtilities.php";
require_once dirname(__FILE__)."/kSettings/_imporKSettings.php";
require_once dirname(__FILE__)."/KThemeTools/KMenuMaker.php";
require_once dirname(__FILE__)."/kThemeUtilities/_setup.php";
require_once dirname(__FILE__)."/shortCodes/includeAll.php";
require_once dirname(__FILE__)."/kWidgets/includeAll.php";
require_once dirname(__FILE__)."/controllersScripts/__requireAllControllers.php";

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(200);



function getKMenuMaker()
{
    $menuMaker = new KThemeTools\KMenuMaker();
    return $menuMaker;
}
function getExtraPageFieldInfos()
{       
    $categoryListDisplay =  ["key"=>"categoryListDisplay","displayName"=>"Name category of list to display (optional)","type"=>"text"];
    $extraFieldsForPages = [ $categoryListDisplay];
    $hashedExtraFieldsForPages = ["categoryListDisplay"=> $categoryListDisplay];

    return ["extraFieldsForPages" => $extraFieldsForPages,
            "hashedExtraFieldsForPages"=>$hashedExtraFieldsForPages,
            "groupKey"=> "kuaminikaPage_fieldGroup"];

}
function generateExtraPageFields($fields)
{
    $groupKey = getExtraPageFieldInfos()["groupKey"];
    $result = array(
        'key' =>   $groupKey ,
        'title' => "Kuaminika Page",
        'fields' => [],
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => "page",
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    );

  

    for ($i=0; $i < sizeof($fields); $i++) 
    { 
      $field = $fields[$i];
      $result["fields"][$i] = array(
           'key' => $groupKey."_".$field["key"],
           'label' =>$field["displayName"],
           'name' => $groupKey."_".$field["key"],
           'type' =>$field["type"],
           'instructions' => '',
           'required' => 0,
           'conditional_logic' => 0,
           'wrapper' => array(
               'width' => '',
               'class' => '',
               'id' => '',
           ),
           'default_value' => '',
           'placeholder' => '',
           'prepend' => '',
           'append' => '',
           'maxlength' => '',
       );   
    }

    acf_add_local_field_group($result);
}

add_action("init",function(){

    $extraFieldsForPages = getExtraPageFieldInfos()["extraFieldsForPages"];//[["key"=>"categoryListDisplay","displayName"=>"Name category of list Display (optional)","type"=>"text"]];
    \generateExtraPageFields($extraFieldsForPages);
});


function setupAdmin()
{
    $themeSettings = getThemeSettings();
    $adminTool = new KAdminTool($themeSettings);
    $adminTool->setItUp();
}
setupAdmin();