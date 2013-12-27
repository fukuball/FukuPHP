<?php
/**
 * seed.php
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /migration/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

require dirname(dirname(__FILE__))."/config/db-param.php";

$db_host       = $database_server['master']['db_host'];
$db_user       = $database_server['master']['db_user'];
$db_password   = $database_server['master']['db_password'];

$con = mysqli_connect($db_host, $db_user, $db_password);

// Check connection
if (mysqli_connect_errno()) {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;

} 

$db_selected = mysqli_select_db($con, "fukuphp");

if (!$db_selected) {

   // If we couldn't, then it either doesn't exist, or we can't see it.
   $sql = 'CREATE DATABASE fukuphp';

   if (mysql_query($sql, $link)) {
      echo "Database fukuphp created successfully\n";
   } else {
      echo 'Error creating database: ' . mysql_error() . "\n";
   }

}

//user_token
$sql = "CREATE TABLE IF NOT EXISTS `user` (".
        "`id` int(11) unsigned NOT NULL AUTO_INCREMENT,".
        "`username` char(30) NOT NULL,".
        "`is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',".
        "`create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',".
        "`modity_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',".
        "`delete_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',".
        "PRIMARY KEY (`id`)".
      ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

mysqli_query($con, $sql);
?>