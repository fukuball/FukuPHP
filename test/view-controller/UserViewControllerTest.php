<?php
class UserViewControllerTest extends PHPUnit_Framework_TestCase
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

    public function testRestPost()
    {

        $view_controller = new UserViewController();
        ob_start();
        $view_controller->restPost(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);
        unset($view_controller);

    }

    public function testRestGet()
    {

        $view_controller = new UserViewController();
        ob_start();
        $view_controller->restGet(array(), '/');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

        ob_start();
        $view_controller->restGet(array(), '/fukuball');
        $output_content = ob_get_contents();
        ob_end_clean();
        $this->assertEquals('This is user fukuball', $output_content);
        unset($view_controller);

    }

    public function testRestPut()
    {

        $view_controller = new UserViewController();
        ob_start();
        $view_controller->restPut(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);
        unset($view_controller);

    }

    public function testRestDelete()
    {

        $view_controller = new UserViewController();
        ob_start();
        $view_controller->restDelete(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);
        unset($view_controller);

    }

    public function testGetUserAction()
    {

        ob_start();
        UserViewController::getUserAction(array('user_id'=>'1'), array());
        $output_content = ob_get_contents();
        ob_end_clean();
        $this->assertEquals('This is user fukuball', $output_content);

    }

}
?>