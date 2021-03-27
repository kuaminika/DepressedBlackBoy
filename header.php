<?php 
/**
 * The header.
 */
?>

<?php


    $themeSettings = getThemeSettings();
    $scriptManager = $themeSettings->getScriptManager();
    $scripts = [];
    $menuMaker = getKMenuMaker();
    $lang =$themeSettings->getLanguage();
    $scripts [] =  $scriptManager->getJSScript("app.js");
    global $post;
   
?>

  <!-- Bootstrap CSS -->

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link href="<?php echo $themeSettings->mediaUrl ?>/style.css" type="text/css" rel="stylesheet" />
  
	<title><?php echo wp_get_document_title(); ?></title>
</head>

<body class="d-flex flex-column h-100">
  <header>
    <nav class="navbar border-bottom border-dark navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container ">
        <a class="navbar-brand" style="width: 30%" href="<?php echo $themeSettings->siteUrl?>/">
          <!-- <img src="display/tmpLogo.png" alt="depressed black boy" />-->
          Depressed black boy
        </a> 
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php 
       //  echo json_encode($post);
        $kMenu =  $menuMaker->createMenuByName($menuMaker->TOP_MENU_NAME);//generateTopMenu($themeSettings->siteUrl."/");
        
      $thePostID = $post? $post->ID:-1;
      ?>
        
        <div class="navbar-collapse collapse justify-content-md-end flex-md-grow-0 flex-sm-grow-1"
          id="navbarSupportedContent" >
          
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 current-id-<?php echo $thePostID?>">



              <?php  
                foreach(  $kMenu->items as $menuItem):?>
                 <?php //print_r($menuItem);
                  
                    $kCurrentPage = ($thePostID == $menuItem->targetId  )? "k-current-menu-item":"";
                 ?>
  			  	     <li class="nav-item mx-0 mx-lg-1 target-<?php echo $menuItem->targetId  ?> target-<?php echo $menuItem->targetObjType?> target-<?php echo $menuItem->targetType?>">
                    <a class="nav-link py-3 py-md-1 px-md-1 <?php echo $kCurrentPage; ?> px-0 px-lg-3 rounded js-scroll-trigger k-mlp-menu-title " data-target-id="<?php echo  $menuItem->targetId;?>" data-title="<?php echo $menuItem->title?>" href="<?php echo $menuItem->url?>"><?php echo $menuItem->title ?></a>
                  </li>
  			      <?php endforeach;?>

            
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
  <main class="  flex-shrink-0">