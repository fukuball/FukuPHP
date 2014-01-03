<?php
/**
 * test-driver.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /test/
 * @author   Fukuball Lin <fukuball@indievox.com>
 * @license  iNDIEVOX Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.indievox.com
 */

require_once dirname(dirname(__FILE__))."/config/test-app-setter.php";

function view_loader($class_name) {
    $file = dirname(dirname(__FILE__)).'/view-controller/'.$class_name . '.php';
    if (file_exists($file)) {
        require $file;
    }
}
spl_autoload_register('view_loader');

function loader($class) {
    $file = $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('loader');
?>