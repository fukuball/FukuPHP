<?php
class FukuPHPAppContainerTest extends PHPUnit_Framework_TestCase
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

    public function testRun()
    {

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = '/';

        ob_start();
        $app_container = new FukuPHPAppContainer();
        $app_container->run();
        $output_content = ob_get_contents();
        ob_end_clean();
        $thread_page_dom = new DomDocument();
        @$thread_page_dom->loadHTML($output_content);
        $title_tags = $thread_page_dom->getElementsByTagName('title');
        $title = $title_tags->item(0)->nodeValue;
        $this->assertEquals('Home Index Page', $title);
        unset($app_container);

        $_SERVER['REQUEST_METHOD'] = 'NOT_EXIST';
        $_SERVER['PATH_INFO'] = '/';

        ob_start();
        $app_container = new FukuPHPAppContainer();
        $app_container->run();
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);
        unset($app_container);

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = '/fukuball';

        ob_start();
        $app_container = new FukuPHPAppContainer();
        $app_container->run();
        $output_content = ob_get_contents();
        ob_end_clean();
        $this->assertEquals('This is user fukuball', $output_content);
        unset($app_container);

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = '/not-exit';

        ob_start();
        $app_container = new FukuPHPAppContainer();
        $app_container->run();
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);
        unset($app_container);

    }

}
?>