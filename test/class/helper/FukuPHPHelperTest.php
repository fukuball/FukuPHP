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

    public function testDoPost()
    {

        $post_url = "http://www.fukuball.com/ckip-client/ckip-process";
        $param = array(
            "paragraph"=>"獨立音樂需要大家一起來推廣，歡迎加入我們的行列！"
        );

        $response = FukuPHPHelper::testDoPost($post_url, $param);

        $thread_page_dom = new DomDocument();
        @$thread_page_dom->loadHTML($response);
        $pre_tags = $thread_page_dom->getElementsByTagName('pre');
        $pre_content = $pre_tags->item(0)->nodeValue;
        print_r($pre_content);

    }

}
?>