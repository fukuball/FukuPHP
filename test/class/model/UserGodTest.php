<?php
class UserGodTest extends PHPUnit_Framework_TestCase
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

    public function testGetUserId()
    {

        $user_god_obj = new UserGod();
        $user_id = $user_god_obj->getUserId('fukuball', 'path');
        $this->assertEquals('1', $user_id);
        unset($user_god_obj);

    }

    public function testDBAccess()
    {

        $user_god_obj = new User();
        $user_god_obj->setDBAccess("other_mode");
        $db_obj = $user_god_obj->getDBAccess();
        $this->assertEquals(true, is_a($db_obj, 'FukuPHPDBAccess'));
        unset($user_god_obj);

    }

    public function testMaxId()
    {

        $user_god_obj = new User();
        $this->assertEquals(1, $user_god_obj->getMaxId());
        unset($user_god_obj);

    }

    public function testCreate()
    {

        $user_god_obj = new User();
        $param = array(
            "path"=>"new-user"
        );
        $user_id = $user_god_obj->create($param);
        $user_obj = new User($user_id);
        $this->assertEquals('new-user', $user_obj->path);
        unset($user_obj);
        unset($user_god_obj);

    }

}
?>