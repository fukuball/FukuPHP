<?php
/**
 * FukuPHPRESTControl.php is the controller
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
 * FukuPHPRESTControl is the controller
 * to dispatch all the rest action to it's controller
 *
 * An example of a FukuPHPRESTControl is:
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
class FukuPHPRESTControl
{

   /**
    * Method pageNotFound
    *
    * @return void
    */
   static function pageNotFound()
   {

      $type = 'page_not_found';
      $parameter = array("none"=>"none");
      $error_messenger = new FukuPHPErrorMessenger($type, $parameter);
      $error_messenger->printErrorJSON();
      unset($error_messenger);
      exit;

   }// end function pageNotFound


}// end class FukuPHPRESTControl
?>