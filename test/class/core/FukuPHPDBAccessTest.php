<?php
class FukuPHPDBAccessTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();
        $param = array();
        $query_instance = $db_obj->insertCommandPrepare($create_user_table_sql, $param);
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

    public function testForceSwitchMaster()
    {

        $db_obj = FukuPHPDBAccess::getInstance();
        FukuPHPDBAccess::forceSwitchMaster();
        $this->assertEquals('one_time', $db_obj->context_status);

    }

    public function testForceSwitchMasterWholeContext()
    {

        $db_obj = FukuPHPDBAccess::getInstance();
        FukuPHPDBAccess::forceSwitchMasterWholeContext();
        $this->assertEquals('whole_context', $db_obj->context_status);

    }

    public function testGetProcesslist()
    {

        $db_obj = FukuPHPDBAccess::getInstance();
        $process_list = $db_obj->getProcesslist();
        $this->assertEquals(true, is_array($process_list));

    }

    public function testGetTablelist()
    {

        $db_obj = FukuPHPDBAccess::getInstance();
        $table_list = $db_obj->getTablelist();
        $this->assertEquals(true, is_array($table_list));

    }

    public function testKillProcess()
    {

        $db_obj = FukuPHPDBAccess::getInstance();
        $process_list = $db_obj->getProcesslist();
        $process_id = $process_list[0]['Id'];
        $this->assertEquals(true, $db_obj->killProcess($process_id));

    }

    public function testInsertCommand()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();
        $insert_id = $db_obj->insertCommand($insert_user_sql);
        unset($db_obj);

        $user_obj = new User($insert_id);
        $this->assertEquals('1', $user_obj->getId());
        unset($user_obj);

    }

    public function testSelectCommand()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();

        $query_result = $db_obj->selectCommand($select_user_sql);
        $result_array = $db_obj->getResultArray($query_result);

        if (empty($result_array)) {
            $insert_id = $db_obj->insertCommand($insert_user_sql);
        }

        $query_result = $db_obj->selectCommand($select_user_sql);
        $result_array = $db_obj->getResultArray($query_result);

        $user_id = $result_array[0]['id'];

        $user_obj = new User($user_id);
        $this->assertEquals($user_id, $user_obj->getId());
        unset($user_obj);

    }

    public function testUpdateCommand()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();

        $query_result = $db_obj->selectCommand($select_user_sql);
        $result_array = $db_obj->getResultArray($query_result);

        if (empty($result_array)) {
            $insert_id = $db_obj->insertCommand($insert_user_sql);
        }

        $affected_rows = $db_obj->updateCommand($update_user_sql);
        $this->assertEquals(1, $affected_rows;

    }

    public function testDeleteCommand()
    {

        include SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();

        $query_result = $db_obj->selectCommand($select_user_sql);
        $result_array = $db_obj->getResultArray($query_result);

        if (empty($result_array)) {
            $insert_id = $db_obj->insertCommand($insert_user_sql);
        }

        $affected_rows = $db_obj->deleteCommand($update_user_sql);
        $this->assertEquals(1, $affected_rows;

    }

}
?>