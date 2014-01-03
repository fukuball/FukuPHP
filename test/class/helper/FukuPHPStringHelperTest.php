<?php
class FukuPHPStringHelperTest extends PHPUnit_Framework_TestCase
{

    public function testStudly()
    {

        $studly_string = FukuPHPStringHelper::studly('fukuball');
        $this->assertEquals("Fukuball", $studly_string);
        $studly_string = FukuPHPStringHelper::studly('lin_fukuball');
        $this->assertEquals("LinFukuball", $studly_string);

    }

}
?>