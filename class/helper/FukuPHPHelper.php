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
    * Method static isPJAX check request is pjax
    *
    * @return boolean $is_pjax
    */
   public static function isPJAX()
   {
      if (   array_key_exists('HTTP_X_PJAX', $_SERVER)
          && $_SERVER['HTTP_X_PJAX'] === 'true'
      ) {

         return true;

      } else {

         return false;

      }// end if

   }// end function isPJAX

   /**
    * Method static getPJAXContainer get pjax target
    *
    * @return string $pjax_target
    */
   public static function getPJAXContainer()
   {
      return $_SERVER['HTTP_X_PJAX_CONTAINER'];

   }// end function getPJAXContainer


   /**
    * Method getUniqueRandomArray get unique random array form weighted array
    *
    * @param array $the_array # array to get random unique element
    * @param int   $num       # number of unique element
    *
    * @return array $unique_random_array
    */
   public static function getUniqueRandomArray($the_array, $num)
   {

      $size_of_the_array = sizeof($the_array);
      $size_of_the_array_unique = array_unique($the_array);

      if (count($size_of_the_array_unique)<$num) {

         $return_array = array();

      } else {

         for ($i=0; $i<$num; $i++) {

            $r = mt_rand(0, $size_of_the_array-1); // generate random key

            if (isset($return_array)) {

               if (in_array($the_array[$r], $return_array)) {

                  --$i;

               } else {

                  $return_array[] = $the_array[$r];

               }// end if

            } else {

               $return_array[] = $the_array[$r];

            }// end if

         }// end for

      }// end if

      return $return_array;

   }// end function getUniqueRandomArray


   /**
    * Method doGet get do get request
    *
    * @param stirng url
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
    * @param stirng url
    * @param array fields
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

   /**
    * Method readfileChunked
    *
    * @param stirng  filename
    * @param boolean retbytes
    *
    * @return string $response
    */
   public static function readfileChunked($filename, $retbytes=true)
   {

      $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
      $buffer = '';
      $cnt = 0;
      $handle = fopen($filename, 'rb');

      if ($handle === false) {
         return false;
      }

      while (!feof($handle)) {

         $buffer = fread($handle, $chunksize);
         echo $buffer;
         ob_flush ();
         flush ();
         if ($retbytes) {
            $cnt += strlen ( $buffer );
         }
      }

      $status = fclose($handle);
      if ($retbytes && $status) {
         return $cnt; // return num. bytes delivered like readfile() does.
      }
      return $status;

   }// end function readfileChunked

}// end class FukuPHPHelper
?>