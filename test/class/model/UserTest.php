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
        $this->assertEquals('fukuball', $user_obj->path);
        unset($user_obj);

    }

    public function testDestruct()
    {

        $user_obj = new User(1);
        unset($user_obj);
        $user_obj = '';
        $this->assertEquals(false, is_a($user_obj, 'User'));

    }


}
?>