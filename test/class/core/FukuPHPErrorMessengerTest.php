<?php
class FukuPHPErrorMessengerTest extends PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {

        ob_start();
        $type = 'page_not_found';
        $parameter = array("none"=>"none");
        $error_messenger = new FukuPHPErrorMessenger($type, $parameter);
        $error_messenger->printErrorJSON();
        unset($error_messenger);
        $output_content = ob_get_contents();
        ob_end_clean();
        $output_decode = json_decode($output_content, true);
        $this->assertEquals('404', $output_decode['response']['status']['code']);

        try {
 
            $type = '';
            $parameter = array("none"=>"none");
            $error_messenger = new FukuPHPErrorMessenger($type, $parameter);
 
        } catch (Exception $e) {
 
            return;
        
        }

        $this->fail('An expected exception has not been raised.');

    }

    public function testDestruct()
    {

        $type = 'page_not_found';
        $parameter = array("none"=>"none");
        $error_messenger = new FukuPHPErrorMessenger($type, $parameter);
        unset($error_messenger);

        $error_messenger = '';
        $this->assertEquals(false, is_a($error_messenger, 'FukuPHPErrorMessenger'));

    }

}
?>