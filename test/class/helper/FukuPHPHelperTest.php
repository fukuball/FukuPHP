<?php
class FukuPHPHelperTest extends PHPUnit_Framework_TestCase
{

    public function testDoGet()
    {

        $response = FukuPHPHelper::doGet("http://www.fukuball.com/ckip-client/record/1.json");
        $response_decode = json_decode($response, true);
        print_r($response_decode);
        $this->assertEquals(
            $response_decode['paragraph'], 
            "http://www.fukuball.com/ckip-client/record/1.json"
        );

    }

}
?>