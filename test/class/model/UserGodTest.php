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

}
?>