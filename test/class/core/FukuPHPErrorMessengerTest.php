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

    }

}
?>