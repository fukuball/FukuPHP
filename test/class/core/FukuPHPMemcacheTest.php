<?php
class FukuPHPMemcacheTest extends PHPUnit_Framework_TestCase
{

    public function testConnectMemcache()
    {

        $memcache_obj = FukuPHPMemcache::connectMemcache('host1');
        $this->assertEquals(true, is_a($memcache_obj, 'Memcache'));

        $memcache_obj = FukuPHPMemcache::connectMemcache('host2');
        $this->assertEquals(true, is_a($memcache_obj, 'Memcache'));


    }

    public function testGetMemcacheKeys()
    {

        $memcache_keys = FukuPHPMemcache::getMemcacheKeys('host1');
        $this->assertEquals(true, is_array($memcache_keys));

    }

}
?>