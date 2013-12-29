<?php
/**
 * indievox.inc
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

// core
//require 'core/IndievoxRESTControl.php';
//require 'core/IndievoxRESTfulInterface.php';
//require 'core/IndievoxErrorMessenger.php';
//require 'core/IndievoxMemcache.php';
//require 'core/IndievoxDBAccess.php';
//require 'core/IndievoxActiveRecordGod.php';
//require 'core/IndievoxActiveRecord.php';

function core_loader($class_name) {
    $file = dirname(dirname(__FILE__)).'/class/core/'.$class_name . '.php';
    if (file_exists($file)) {
    	require $file;
    }
}
spl_autoload_register('core_loader');
//
//// helper
//function helper_loader($class_name) {
//    $file = dirname(dirname(__FILE__)).'/class/helper/'.$class_name . '.php';
//    if (file_exists($file)) {
//    	require_once $file;
//    }
//}
//spl_autoload_register('helper_loader');
//
//// helper
//function model_loader($class_name) {
//    $file = dirname(dirname(__FILE__)).'/class/model/'.$class_name . '.php';
//    if (file_exists($file)) {
//    	require_once $file;
//    }
//}
//spl_autoload_register('model_loader');
?>