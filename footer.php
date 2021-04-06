


<?php


    $themeSettings = getThemeSettings();
    $scriptManager = $themeSettings->getScriptManager();
    $scripts = [];
    $fieldGroupName = $themeSettings->adminFormFields["socialMedia"]["name"];
    $settingsTool  = $themeSettings->getSettingsTool($fieldGroupName);
    $stngs_socialMedia = (array) $settingsTool->getGroupSettings($fieldGroupName);
    $stngs_socialMedia = new \KUtilities\KArrayWrapper($stngs_socialMedia,true);
    
    $fieldGroupName = $themeSettings->adminFormFields["colorChoosers"]["name"];
    $stngs_colors = (array) $settingsTool->getGroupSettings($fieldGroupName);
    $stngs_colors = new \KUtilities\KArrayWrapper($stngs_colors,true);
    $lang =$themeSettings->getLanguage();
   $scripts [] =  $scriptManager->getJSScript("app.js");
?>
  </main>
  <footer class="footer mt-auto py-3 bg-light" style="background-color: <?php echo $stngs_colors->get("bgBarColorCode") ?> !important; color:<?php echo $stngs_colors->get("headerbarFontColorCode")?>">
    <div class="container-fluid">      
      <div class="container mt-2 d-flex justify-content-center"  >
        <a href="<?php echo $stngs_socialMedia->get("instagram")?> " target="_blank" style=" color:<?php echo $stngs_colors->get("headerbarFontColorCode")?> !important"><i class="fa fa-instagram fa-2x mx-1"></i></a>
        <a href="<?php echo $stngs_socialMedia->get("twitter")?>" target="_blank"   style=" color:<?php echo $stngs_colors->get("headerbarFontColorCode")?> !important"><i class="fa fa-twitter fa-2x mx-1"></i></a>
      </div>
        <div class="container">Copyright <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. All rights reserved.</div>
    </div>
  </footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <?php 
    $scriptManager->addForeignJSScript("bootstrap.bundle.min.js","https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js");
  ?>
  <script src="<?php echo $themeSettings->mediaUrl ?>/js/KLIB/kLibAll.min.js"></script>
  <script src="<?php echo $themeSettings->mediaUrl ?>/js/kcomponents.js"></script>
</body>

</html>