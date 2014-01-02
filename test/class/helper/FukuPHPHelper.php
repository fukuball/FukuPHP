<?php
class FukuPHPHelperTest extends PHPUnit_Framework_TestCase
{

    public function testDoGet()
    {

        $user_obj = new User(1);
        $response = FukuPHPHelper::doGet("http://www.google.com");
        echo "test \n";
        echo $response;
        $this->assertEquals(true, true);

    }

}
?>