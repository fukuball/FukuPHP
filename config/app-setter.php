<?php
/**
 * app-setter.php initialize application settings
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /config/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error.log');
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();

require_once dirname(__FILE__).'/system-environment.php';

// some settings
define('DEFAULT_VIEW_CONTROLLER_PATH', SITE_ROOT.'/view-controller/HomeViewController.php');
define('DEFAULT_VIEW_CONTROLLER', 'HomeViewController');
define('USER_VIEW_CONTROLLER_PATH', SITE_ROOT.'/view-controller/UserViewController.php');
define('USER_VIEW_CONTROLLER', 'UserViewController');

// library
require_once SITE_ROOT.'/class/FukuPHP.inc';
?>