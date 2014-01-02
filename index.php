<?php
/**
 * index.php is the controller of whole app
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

require_once dirname(__FILE__)."/config/app-setter.php";

$app_container = new AppContainer();
$app_container->run();
?>