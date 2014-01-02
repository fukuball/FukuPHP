<?php
/**
 * test-db-param.php define db access constant
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

$database_server = array(
    "master"=>array(
        "db_host"=>'localhost',
        "db_name"=>'fukuphp',
        "db_user"=>'root',
        "db_password"=>''
    ),
    "slave1"=>array(
        "db_host"=>'localhost',
        "db_name"=>'fukuphp',
        "db_user"=>'root',
        "db_password"=>''
    ),
    "slave2"=>array(
        "db_host"=>'localhost',
        "db_name"=>'fukuphp',
        "db_user"=>'root',
        "db_password"=>'',
    )
);

$slave_database_name = array('slave1', 'slave2');
?>