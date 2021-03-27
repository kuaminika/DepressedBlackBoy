<?php
namespace KThemeTools;

class KMenuItem
{
    public $id;
    public $url;
    public $title;
    public $targetId;
    public $targetType;
    public $targetObjType;
}

class KMenu
{
    public $id;
    public $name;
    public $items;
    public $itemCount;

    public function __construct($name)
    {
        $NonExistantId= -1;
        $this->name = $name;
        $this->id = $NonExistantId;
        $this->itemCount = 0;
        $this->items = [];
    }
}


class KMenuMaker
{
    public  $TOP_MENU_NAME = "topMenu_en";
    private  $siteMenus;
    function __construct()
    {
        
       $this->siteMenus= wp_get_nav_menus();
    }
    

        
        
 
    private function findMenuByName($menuName) //returns KMenu
    {
        $result = new KMenu($menuName);
        foreach($this->siteMenus as $menu)
        {
          
            if($menu->name == $menuName)
            {   
                $result->id = $menu->term_id;
                return $result;
            }
        }
        return $result;
    }


    private function genetateMenuItems(KMenu $menu)
    {
        $menuId = $menu->id;// $this->findMenuIdByName($menuName);        
        
        if($menuId<0 ) 
        {
            $menu->items = [];
            return $menu;
        }
        $rawMenuItems =  wp_get_nav_menu_items($menuId);
        //echo "[";
        foreach($rawMenuItems as $rawItem)
        {
            
            echo "<span class='d-none'>". json_encode($rawItem)."</span>";
            //continue;
            //object_id
            $kItem = new KMenuItem();
            $kItem->id = $rawItem->id;
            $kItem->url = $rawItem->url;
            $kItem->title = $rawItem->title;
            $kItem->targetId = $rawItem->object_id;
            $kItem->targetObjType = $rawItem->object;
            $kItem->targetType = $rawItem->type;
            $menu->items[] = $kItem;
        }
      //  echo '0]';
        return $menu;
    }


    function createMenuByName($menuName)
    {
        $kMenu = $this->findMenuByName($menuName);
        $kMenu = $this->genetateMenuItems($kMenu);

        return $kMenu;
    }
    
    function findMenuIdByName($menuName)
    {
        
        foreach($this->siteMenus as $menu)
        {
          
            if($menu->name == $menuName)
            {   
                echo json_encode($menu)."\n";
                return $menu->term_id;
            }
        }
        return -1;
    }
    

    function showMenu($menuName)
    {
        wp_nav_menu(
            array(
                'menu' => $menuName,
                // 'theme_location' => $menuName,
                'menu_class'     => 'main-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )
        );
    }
    
    public function getBrowserLanguage()
    {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $acceptLang = ['fr', 'it', 'en'];
        $lang = in_array($lang, $acceptLang) ? $lang : 'en';
        return $lang;
    }
    
    
    
    
}

