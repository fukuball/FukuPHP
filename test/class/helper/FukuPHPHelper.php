<?php
class FukuPHPHelperTest extends PHPUnit_Framework_TestCase
{

    public function testDoGet()
    {

        $response = FukuPHPHelper::doGet("http://www.google.com");
        echo "test \n";
        echo $response;
        $this->assertEquals(true, true);

    }

}
?>