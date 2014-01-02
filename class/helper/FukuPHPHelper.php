<?php
/**
 * FukuPHPHelper.php is site helper class
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/helper/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/**
 * FukuPHPHelper is site helper class
 *
 * An example of a FukuPHPHelper is:
 *
 * <code>
 *   FukuPHPHelper::function();
 * </code>
 *
 * @category PHP
 * @package  /class/helper/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class FukuPHPHelper
{

    /**
     * Method doGet get do get request
     *
     * @param string $url # input url
     *
     * @return string $response
     */
    public static function doGet($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }// end function doGet

    /**
     * Method doPost get do post request
     *
     * @param string $url    # input url
     * @param array  $fields # input valuec
     *
     * @return string $response
     */
    public static function doPost($url, $fields)
    {
        $fields_string = '';

        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }// end function doPost

}// end class FukuPHPHelper
?>