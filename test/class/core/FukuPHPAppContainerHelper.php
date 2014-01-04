<?php
class FukuPHPAppContainerHelperTest extends PHPUnit_Framework_TestCase
{

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
        unset($view_controller);


    }

}
?>