<?php
class UserViewControllerTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

        require_once SITE_ROOT."/migration/schema.php";

        $db_obj = FukuPHPDBAccess::getInstance();
        $param = array();
        $query_instance = $db_obj->insertCommandPrepare($create_user_table_sql, $param);
        $insert_id = $db_obj->insertCommandPrepare($insert_user_sql, $param);
        echo $insert_id;

    }

    public function tearDown()
    {

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

    }

    public function testRestGet()
    {

        $view_controller = new UserViewController();
        ob_start();
        $view_controller->restGet(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

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

    }

    public function testGetUserAction()
    {

    }

}
?>