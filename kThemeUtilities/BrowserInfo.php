<?php

namespace kThemeUtilities;


class BrowserInfo
{
    function getLanguage()
    {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $acceptLang = ['fr', 'it', 'en'];
        $lang = in_array($lang, $acceptLang) ? $lang : 'en';
        return $lang;
    }

    function getFullUrlUsed()
    { 
        // Program to display URL of current page. 
        
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
            $link = "https"; 
        else
            $link = "http"; 
        
        // Here append the common URL characters. 
        $link .= "://"; 
        
        // Append the host(domain name, ip) to the URL. 
        $link .= $_SERVER['HTTP_HOST']; 
        
        // Append the requested resource location to the URL 
        $link .= $_SERVER['REQUEST_URI']; 
            
        // Print the link 
        return $link; 
         
        
        

    }

}
?>