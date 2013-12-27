<?php
/**
 * db-param.php define db access constant
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
      "db_host"=>'fukuball-db1.cm4k6347dhx2.us-west-2.rds.amazonaws.com',
      "db_name"=>'fukuphp',
      "db_user"=>'fukuphp',
      "db_password"=>'pass2fuku'
   ),
   "slave1"=>array(
      "db_host"=>'fukuball-db1.cm4k6347dhx2.us-west-2.rds.amazonaws.com',
      "db_name"=>'fukuphp',
      "db_user"=>'fukuphp',
      "db_password"=>'pass2fuku'
   ),
   "slave2"=>array(
      "db_host"=>'fukuball-db1.cm4k6347dhx2.us-west-2.rds.amazonaws.com',
      "db_name"=>'fukuphp',
      "db_user"=>'fukuphp',
      "db_password"=>'pass2fuku',
   ),
);

$slave_database_name = array('slave1', 'slave2');
?>