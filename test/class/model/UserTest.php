<?php
class UserTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();
        $param = array();
        $query_instance = $db_obj->insertCommandPrepare($create_user_table_sql, $param);
        $insert_id = $db_obj->insertCommandPrepare($insert_user_sql, $param);
        unset($db_obj);

    }

    public function tearDown()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();
        $param = array();
        $query_instance = $db_obj->deleteCommandPrepare($drop_user_table_sql, $param);
        unset($db_obj);

    }

    public function testConstruct()
    {

        $user_obj = new User(1);
        $this->assertEquals('fukuball', $user_obj->path);
        unset($user_obj);

        $user_obj = new User(1);
        $this->assertEquals('1', $user_obj->id);
        unset($user_obj);

        $test_exception = false;
        try { 
            $user_obj = new User(0);
        } catch (Exception $e) {
            $test_exception = true;
        }
        if ($test_exception==false) {
            $this->fail('An expected exception has not been raised.');
        }

    }

    public function testDestruct()
    {

        $user_obj = new User(1);
        unset($user_obj);
        $user_obj = '';
        $this->assertEquals(false, is_a($user_obj, 'User'));

    }

    public function testDBAccess()
    {

        $user_obj = new User(1);
        $user_obj->setDBAccess("other_mode");
        $db_obj = $user_obj->getDBAccess();
        $this->assertEquals(true, is_a($db_obj, 'FukuPHPDBAccess'));
        unset($user_obj);

    }

    public function testMemcacheAccess()
    {

        $user_obj = new User(1);
        $memcache_obj = $user_obj->getMemcacheAccess();
        $this->assertEquals(true, is_a($memcache_obj, 'Memcache'));
        unset($user_obj);

    }

    public function testDeleteMyMemcache()
    {

        $user_obj = new User(1);
        unset($user_obj);
        $user_obj = new User(1);
        $this->assertEquals(true, $user_obj->deleteMyMemcache());
        $this->assertEquals(false, $user_obj->deleteMyMemcache());
        unset($user_obj);        

    }

    public function testGetTableName()
    {

        $user_obj = new User(1);
        $this->assertEquals("user", $user_obj->getTableName());
        unset($user_obj);

    }

    public function testGetIsDeleted()
    {

        $user_obj = new User(1);
        $this->assertEquals(0, $user_obj->getIsDeleted());
        unset($user_obj);

    }

    public function testUpdate()
    {

        $user_obj = new User(1);
        $param = array(
            "path" => "fukuball-lin"
        );
        $user_obj->update($param);
        $this->assertEquals('fukuball-lin', $user_obj->path);
        $param = array(
            "path" => "fukuball"
        );
        $user_obj->update($param);
        unset($user_obj);

    }

    public function testSave()
    {

        $user_obj = new User(1);
        $user_obj->path = 'fukuball-lin';
        $user_obj->save();
        $this->assertEquals('fukuball-lin', $user_obj->path);
        $user_obj->path = 'fukuball';
        $user_obj->save();
        unset($user_obj);

    }

    public function testDestroyNRecover()
    {

        $user_obj = new User(1);
        $user_obj->destroy();
        $this->assertEquals(1, $user_obj->getIsDeleted());
        $user_obj->recover();
        $this->assertEquals(0, $user_obj->getIsDeleted());
        $user_obj = new User(1);
        $user_obj->destroy('hard');
        unset($user_obj);

        $test_exception = false;
        try { 
            $user_obj = new User(1);
        } catch (Exception $e) {
            $test_exception = true;
        }
        if ($test_exception==false) {
            $this->fail('An expected exception has not been raised.');
        }

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();
        $param = array();
        $insert_id = $db_obj->insertCommandPrepare($insert_user_sql, $param);
        unset($db_obj);

    }



}
?>