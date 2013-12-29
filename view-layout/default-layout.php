
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
      require SITE_ROOT."/view-component/meta-component.php";
      ?>
      <?php
      require SITE_ROOT."/view-component/style-component.php";
      ?>
   </head>
   <body>
      <div class="container">
         <?php
         require SITE_ROOT."/view-component/header.php";
         ?>
         <?php
         require SITE_ROOT.$yield_path;
         ?>
         <?php
         require SITE_ROOT."/view-component/footer.php";
         ?>
      </div> <!-- /container -->
      <?php
      require SITE_ROOT."/view-component/javascript-component.php";
      ?>
   </body>
</html>
