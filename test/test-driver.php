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

function loader($class) {
    $file = $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('loader');
?>