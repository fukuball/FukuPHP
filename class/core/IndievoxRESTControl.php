<?php
/**
 * IndievoxRESTControl.php is the controller
 * to dispatch all the rest action to it's controller
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/**
 * IndievoxRESTControl is the controller
 * to dispatch all the rest action to it's controller
 *
 * An example of a IndievoxRESTControl is:
 *
 * <code>
 *  # This will done by rest request
 * </code>
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class IndievoxRESTControl
{

   /**
    * Method exceptionResponse output some default exception
    *
    * @param int    $statusCode # the http status code
    * @param string $message    # status message
    *
    * @return void
    */
   static function exceptionResponse($statusCode, $message)
   {

      header("HTTP/1.0 {$statusCode} {$message}");
      echo "{$statusCode} {$message}";
      exit;

   }// end function exceptionResponse


}// end class IndievoxRESTControl
?>