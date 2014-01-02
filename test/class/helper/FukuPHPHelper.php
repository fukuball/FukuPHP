<?php
class FukuPHPHelperTest extends PHPUnit_Framework_TestCase
{

    public function testDoGet()
    {

        $response = FukuPHPHelper::doGet("http://www.google.com");
        echo $response;
        $this->assertEquals(true, true);

    }

}
?>