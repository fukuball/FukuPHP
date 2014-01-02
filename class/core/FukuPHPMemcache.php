<?php
/**
 * FukuPHPMemcache.php is memcach class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/**
 * FukuPHPMemcache is memcache class
 *
 * An example of a FukuPHPMemcache is:
 *
 * <code>
 *   $memcache_obj = FukuPHPMemcache::getInstance($key);
 * </code>
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class FukuPHPMemcache
{

    protected static $memcache_server;
    protected static $instance_count = 0;
 
    /**
     * Method init to initial memcache connection
     *
     * @return void
     */
    public static function init()
    {
 
        if (ENABLE_CACHE) {
 
            include SITE_ROOT."/config/memcache-param.php";
 
            self::$memcache_server = array();
 
            // connect first server
            $count = 1;
            foreach ($memcache_server_name as $key => $this_memcache_server_name) {
 
                self::$memcache_server[$this_memcache_server_name] = '';
 
                if ($count==1) {
 
                    if (   !self::$memcache_server[$this_memcache_server_name]
                        || !isset(self::$memcache_server[$this_memcache_server_name])
                        || empty(self::$memcache_server[$this_memcache_server_name])
                    ) {
                        self::$memcache_server[$this_memcache_server_name] = new Memcache();
                        self::$memcache_server[$this_memcache_server_name]->pconnect(
                            $memcache_server[$this_memcache_server_name]['cache_host'],
                            $memcache_server[$this_memcache_server_name]['cache_port']
                        );
                        self::$instance_count++;
                    }
 
                }
 
                $count++;
 
            }
 
        }
 
    }// end function init
 
    /**
     * Method getInstance to get memcache_obj
     *
     * @param string $memcache_key # the memcache key
     *
     * @return object $memcache_obj
     */
    public static function getInstance($memcache_key)
    {
 
        include SITE_ROOT."/config/memcache-param.php";
 
        if (!empty($memcache_server_name)) {
 
            $memcache_key_array = explode('_', $memcache_key);
 
            // default use first host
            $use_host = $memcache_server_name[0];
 
            switch ($memcache_key_array[1]) {
 
            default :
 
                $use_host = $memcache_server_name[0];
 
                break;
 
            }// end switch
 
            if (   !self::$memcache_server[$use_host]
                || !isset(self::$memcache_server[$use_host])
                || empty(self::$memcache_server[$use_host])
            ) {
                self::$memcache_server[$use_host] = new Memcache();
                self::$memcache_server[$use_host]->pconnect(
                    $memcache_server[$use_host]['cache_host'],
                    $memcache_server[$use_host]['cache_port']
                );
                self::$instance_count++;
            }
 
            return self::$memcache_server[$use_host];
        }
 
    }// end function getInstance
 
    /**
     * Method connectMemcache delete from memory cache
     *
     * @param string $host # the host key
     *
     * @return boolean $is_success
     */
    public static function connectMemcache($host)
    {
 
        if (   !self::$memcache_server[$host]
            || !isset(self::$memcache_server[$host])
            || empty(self::$memcache_server[$host])
        ) {
            self::$memcache_server[$host] = new Memcache();
            self::$memcache_server[$host]->pconnect(
                $memcache_server[$host]['cache_host'],
                $memcache_server[$host]['cache_port']
            );
            self::$instance_count++;
        }
 
        return self::$memcache_server[$host];
 
    }// end function connectMemcache
 
    /**
     * Method getMemcacheKeys get all memcache key
     *
     * @param string $host # the host key
     *
     * @return array $memcache_key_value
     */
    public static function getMemcacheKeys($host)
    {
 
        $memcache_obj = FukuPHPMemcache::connectMemcache($host);
 
        $list = array();
 
        $all_slabs = $memcache_obj->getExtendedStats('slabs');
        $items = $memcache_obj->getExtendedStats('items');
 
        foreach ($all_slabs as $server => $slabs) {
 
            foreach ($slabs AS $slab_id => $slab_meta) {
 
                $cdump = $memcache_obj->getExtendedStats('cachedump', (int)$slab_id);
 
                foreach ($cdump AS $keys => $arr_val) {
 
                    if (!is_array($arr_val)) {
 
                        continue;
 
                    }// end if
 
                    foreach ($arr_val AS $k => $v) {
 
                        $key_array = explode("_", $k);
 
                        if ($key_array[0] == substr(KEY_PREFIX, 0, -1)) {
 
                            array_push($list, $k);
 
                        }// end if
 
                    }// end foreach
 
                }// end foreach
 
            }// end foreach
 
        }// end foreach
 
        unset($memcache_obj);
 
        return $list;
 
    }// end function getMemcacheKeys
 
    /**
     * Method __destruct unset instance value
     *
     * @return void
     */
    public function __destruct()
    {
 
    }// end function __destruct

}// end class FukuPHPMemcache

// initial memcache connection
FukuPHPMemcache::init();
?>