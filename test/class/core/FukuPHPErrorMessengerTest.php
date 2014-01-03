<?php
class FukuPHPErrorMessengerTest extends PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {

        $type = 'page_not_found';
        $parameter = array("none"=>"none");
        $error_messenger = new FukuPHPErrorMessenger($type, $parameter);
        $this->assertEquals('page_not_found', $error_messenger->type);
        unset($error_messenger);

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