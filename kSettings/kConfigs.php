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
    ,"siteTitle_default" => [
        "en"=>"First and Finest Consulting Company in Business Industrial Optimisation",
        "fr"=>"La premi&egrave;re et meilleure soci&eacute;t&eacute; de conseil et d'optimisation industrielle en Afrique"        
    ]
   
    ,"adminAPINamespace"=>"w1/v1"
    ,"controllerPagePath"=>"controllerScripts"
    ,"adminFormFields"=>[
        ["fieldName" =>"contactFormTitle" ,"fieldLabel"=>"Contact form title"],
        ["fieldName" =>"slogan" ,"fieldLabel"=>"Slogan"],

        ["fieldName" =>"firstNameField_label" ,"fieldLabel"=>"First name label msg"],
        ["fieldName" =>"firstNameField_error" ,"fieldLabel"=>"First name error msg"],

        ["fieldName" =>"lastNameField_label" ,"fieldLabel"=>"Last name label msg"],
        ["fieldName" =>"lastNameField_error" ,"fieldLabel"=>"Last name error msg"],

        ["fieldName" =>"companyField_label" ,"fieldLabel"=>"Company label msg"],
      
        ["fieldName" =>"jobTitleField_label" ,"fieldLabel"=>"Job title label msg"],
        ["fieldName" =>"jobTitleField_error" ,"fieldLabel"=>"Job title error msg"],

        ["fieldName" =>"languageField_label" ,"fieldLabel"=>"Language label msg"],

        ["fieldName" =>"phone_label" ,"fieldLabel"=>"Phone label msg"],

        ["fieldName" =>"emailField_label" ,"fieldLabel"=>"Email label msg"],
        ["fieldName" =>"emailField_error" ,"fieldLabel"=>"Email error msg"],

        ["fieldName" =>"subjectField_label" ,"fieldLabel"=>"Subject label msg"],

        ["fieldName" =>"message_label" ,"fieldLabel"=>"Message label msg"],

        ["fieldName" =>"submitBtn_label" ,"fieldLabel"=>"Send btn label msg"]

    ]
];
