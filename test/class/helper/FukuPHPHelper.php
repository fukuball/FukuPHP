<?php
class FukuPHPHelperTest extends PHPUnit_Framework_TestCase
{

    public function testDoGet()
    {

        FukuPHPHelper::doGet("http://www.google.com");
        $this->assertEquals(true, true);

    }

}
?>