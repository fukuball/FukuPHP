<?php
class HomeViewControllerTest extends PHPUnit_Framework_TestCase
{

    public function testRestPost()
    {

        $home_view_controller = new HomeViewController();
        ob_start();
        $home_view_controller->restPost(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

    }

    public function testRestGet()
    {

        $home_view_controller = new HomeViewController();
        ob_start();
        $home_view_controller->restGet(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

        $home_view_controller = new HomeViewController();
        ob_start();
        $home_view_controller->restGet(array(), '/');
        $output_content = ob_get_contents();
        ob_end_clean();
        $thread_page_dom = new DomDocument();
        @$thread_page_dom->loadHTML($output_content);
        $title_tags = $thread_page_dom->getElementsByTagName('title');
        $title = $title_tags->item(0)->nodeValue;
        $this->assertEquals('Home Index Page', $title);

    }

    public function testRestPut()
    {

        $home_view_controller = new HomeViewController();
        ob_start();
        $home_view_controller->restPut(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

    }

    public function testRestDelete()
    {

        $home_view_controller = new HomeViewController();
        ob_start();
        $home_view_controller->restDelete(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

    }

    public function testGetIndexAction()
    {

        $this->assertEquals(true, true);

    }

}
?>