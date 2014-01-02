<?php
class FukuPHPHelperTest extends PHPUnit_Framework_TestCase
{

    public function testDoGet()
    {

        $response = FukuPHPHelper::doGet("http://www.fukuball.com/ckip-client/record/1.json");
        $response_decode = json_decode($response, true);
        $this->assertEquals(
            $response_decode['paragraph'], 
            "獨立音樂需要大家一起來推廣，歡迎加入我們的行列！"
        );

    }

}
?>