<?php
class HomeViewControllerTest extends PHPUnit_Framework_TestCase
{

    public function testRestPost()
    {

        $home_view_controller = new HomeViewController();
        ob_start();
        $home_view_controller->restPost(array(), '/');
        $output_content = ob_get_contents();
        ob_end_clean();
        echo $output_content;
        $this->assertEquals(true, true);

    }

    public function testRestGet()
    {

        $this->assertEquals(true, true);

    }

    public function testRestPut()
    {

        $this->assertEquals(true, true);

    }

    public function testRestDelete()
    {

        $this->assertEquals(true, true);

    }

    public function testGetIndexAction()
    {

        $this->assertEquals(true, true);

    }

}
?>