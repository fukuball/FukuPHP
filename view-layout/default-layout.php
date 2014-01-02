<?php
/**
 * default-layout.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-layout/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */
?>
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
