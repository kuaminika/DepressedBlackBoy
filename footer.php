


<?php


$themeSettings = getThemeSettings();
    $scriptManager = $themeSettings->getScriptManager();
    $scripts = [];
    
    $lang =$themeSettings->getLanguage();
   $scripts [] =  $scriptManager->getJSScript("app.js");
?>
  </main>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container-fluid">      
      <div class="container mt-2 d-flex justify-content-center">
        <a href="https://www.facebook.com/Randon-Wright-Photography-1600383503566816/" target="_blank"><i  class="fa fa-facebook fa-2x mx-1"></i></a>
        <a href="https://www.instagram.com/wrightshots/" target="_blank"><i class="fa fa-instagram fa-2x mx-1"></i></a>
        <a href="https://twitter.com/ranwriphotos" target="_blank"><i class="fa fa-twitter fa-2x mx-1"></i></a>
        <a href="https://www.flickr.com/photos/102887196@N08/" target="_blank"><i class="fa fa-flickr fa-2x mx-1"></i></a>
      </div>
        <div class="container">Copyright <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?>. All rights reserved.</div>
    </div>
  </footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>
  <script src="<?php echo $themeSettings->mediaUrl ?>/js/KLIB/kLibAll.min.js"></script>
  <script src="<?php echo $themeSettings->mediaUrl ?>/js/kcomponents.js"></script>
</body>

</html>