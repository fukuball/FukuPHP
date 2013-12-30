<?php
/**
 * system-environment.php initialize mode environment
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

// http or https
$host_protocol = 'http';
if ($_SERVER['HTTPS'] == 'on') {
   $host_protocol = 'https';
}

// stage mode
define("SITE_ROOT", "/var/www/FukuPHP");
define("SITE_HOST", $host_protocol."://www.fuku.io");
define("SITE_DOMAIN", "www.fuku.io");
define("SYSTEM_MODE", 'production'); // production, test
define("KEY_PREFIX", "fukuphp_");
define("ENABLE_CACHE", true);
?>