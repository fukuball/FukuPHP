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

require_once dirname(dirname(__FILE__))."/config/app-setter.php";

// core
function core_loader($class_name) {
    $file = dirname(dirname(__FILE__)).'/class/core/'.$class_name . '.php';
    if (file_exists($file)) {
        require $file;
    }
}
spl_autoload_register('core_loader');

// helper
function helper_loader($class_name) {
    $file = dirname(dirname(__FILE__)).'/class/helper/'.$class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('helper_loader');

// helper
function model_loader($class_name) {
    $file = dirname(dirname(__FILE__)).'/class/model/'.$class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('model_loader');

function loader($class) {
    $file = $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('loader');
?>