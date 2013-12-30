<?php
/**
 * memcache-param.php define memcache access constant
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

$memcache_server = array(
   "host1"=>array(
      "cache_host"=>'fukuball-cache.j1teqo.cfg.usw2.cache.amazonaws.com',
      "cache_port"=>'11211'
   ),
   "host2"=>array(
      "cache_host"=>'fukuball-cache.j1teqo.cfg.usw2.cache.amazonaws.com',
      "cache_port"=>'11211'
   )
);

$memcache_server_name = array('host1', 'host2');
?>