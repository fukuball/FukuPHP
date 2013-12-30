<?php
/**
 * FukuPHPStringHelper.php is site helper class
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
 * FukuPHPStringHelper is site helper class
 *
 * An example of a FukuPHPStringHelper is:
 *
 * <code>
 *   FukuPHPStringHelper::function();
 * </code>
 *
 * @category PHP
 * @package  /class/helper/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class FukuPHPStringHelper
{

   /**
    * Method static studly convert a value to studly caps case.
    *
    * @param  string  $value
    * @return string
    */
   public static function studly($value)
   {
         
      $value = ucwords(str_replace(array('-', '_'), ' ', $value));

      return str_replace(' ', '', $value);
   
   }// end function studly

}// end class FukuPHPStringHelper
?>