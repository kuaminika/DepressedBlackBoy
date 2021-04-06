<?php 

function getCurrentPageUrl()
{
    $arr = explode('?', $_SERVER['REQUEST_URI'], 2);

    if(!array_key_exists(0,$arr)) return get_site_url();

    return $arr[0];

}


$configsArr = [
    "mediaUrl"=>get_template_directory_uri()
    ,"siteUrl" =>get_home_url()
    ,"templatesDirectory" =>get_template_directory_uri()."/views"
    ,"currentPageUrl"=>  getCurrentPageUrl() 
    ,"themeAdminPageTitle"=>"Kuaminika Simple Theme"
    ,"themeAdminPageSlug"=>"kuaminikaSimpleTheme_settings"
    ,"mediaUrl_wp"=>get_template_directory_uri()
    ,"siteTitle_default" => [//TODO: make this point to getbloginfo or somehting
        "en"=>"First and Finest Consulting Company in Business Industrial Optimisation",
        "fr"=>"La premi&egrave;re et meilleure soci&eacute;t&eacute; de conseil et d'optimisation industrielle en Afrique"        
    ]
   
    ,"adminAPINamespace"=>"w1/v1"
    ,"controllerPagePath"=>"controllerScripts"
    ,"adminFormFields"=>[
        "socialMedia"=>[
                            "name"=>"socialMedia",
                            "fields"=>[
                              ["fieldName" =>"instagram" ,"fieldLabel"=>"instagramUrl"]
                            , ["fieldName" =>"twitter" ,"fieldLabel"=>"twitterUrl"]  
                            ]   
                        ],
        "colorChoosers"=>[
                            "name"=>"colorChoosers",
                            "fields"=>[
                              ["fieldName" =>"bgBarColorCode" ,"fieldLabel"=>"Background bars color code"]
                            , ["fieldName" =>"headerbarFontColorCode" ,"fieldLabel"=>"Header bar color code"]  
                            , ["fieldName" =>"BrandFontColorCode" ,"fieldLabel"=>"Brand color code"] 
                            ]   
                        ]
    ]
];
