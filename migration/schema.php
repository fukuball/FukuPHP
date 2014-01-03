<?php
/**
 * schema.php
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

require_once dirname(dirname(__FILE__))."/config/db-param.php";

$db_name = $database_server['master']['db_name'];

$create_database_sql = "CREATE DATABASE $db_name";

$create_user_table_sql = "CREATE TABLE IF NOT EXISTS `user` (".
                            "`id` int(11) unsigned NOT NULL AUTO_INCREMENT,".
                            "`path` char(30) NOT NULL,".
                            "`is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',".
                            "`create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',".
                            "`modify_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',".
                            "`delete_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',".
                            "PRIMARY KEY (`id`)".
                        ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

$insert_user_sql = "INSERT INTO `user` (`id`, `path`, `is_deleted`, `create_time`, `modify_time`, `delete_time`) VALUES".
                        "(1, 'fukuball', 0, '2013-12-30 00:00:00', '2013-12-30 16:12:18', '0000-00-00 00:00:00');";
?>