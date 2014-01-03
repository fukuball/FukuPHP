<?php
class HomeViewControllerTest extends PHPUnit_Framework_TestCase
{

    public function testRestPost()
    {

        $view_controller = new HomeViewController();
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

        $view_controller = new HomeViewController();
        ob_start();
        $view_controller->restGet(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

        ob_start();
        $view_controller->restGet(array(), '/');
        $output_content = ob_get_contents();
        ob_end_clean();
        $thread_page_dom = new DomDocument();
        @$thread_page_dom->loadHTML($output_content);
        $title_tags = $thread_page_dom->getElementsByTagName('title');
        $title = $title_tags->item(0)->nodeValue;
        $this->assertEquals('Home Index Page', $title);
        unset($view_controller);

    }

    public function testRestPut()
    {

        $view_controller = new HomeViewController();
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

        $view_controller = new HomeViewController();
        ob_start();
        $view_controller->restDelete(array(), '/page_not_found');
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);
        unset($view_controller);

    }

    public function testGetIndexAction()
    {

        ob_start();
        HomeViewController::getIndexAction();
        $output_content = ob_get_contents();
        ob_end_clean();
        $thread_page_dom = new DomDocument();
        @$thread_page_dom->loadHTML($output_content);
        $title_tags = $thread_page_dom->getElementsByTagName('title');
        $title = $title_tags->item(0)->nodeValue;
        $this->assertEquals('Home Index Page', $title);

    }

}
?>