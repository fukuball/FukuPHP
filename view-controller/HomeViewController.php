<?php
/**
 * HomeViewController.php is the controller
 * to dispatch home actions with home view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-controller/
 * @author   Fukuball Lin <fukuball@indievox.com>
 * @license  iNDIEVOX Licence
 * @version  Release: <1.0>
 * @link     http://www.indievox.com
 */

/**
 * HomeViewController.php is the controller
 * to dispatch home actions with home view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-controller/
 * @author   Fukuball Lin <fukuball@indievox.com>
 * @license  iNDIEVOX Licence
 * @version  Release: <1.0>
 * @link     http://www.indievox.com
 */
class HomeViewController
   extends IndievoxRESTControl
      implements IndievoxRESTfulInterface
{

   /**
    * Dispatch post actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restPost($segments)
   {

      $request_url = '/';

      if ( isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/' ) {

         $request_url = $_SERVER['PATH_INFO'];

      }

      $url_matches_param = array();

      switch ($request_url) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messenger = new IndievoxErrorMessenger($type, $parameter);
         $error_messenger->printErrorJSON();
         unset($error_messenger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restPost

   /**
    * Dispatch get actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restGet($segments)
   {

      $request_url = '/';

      if ( isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/' ) {

         $request_url = $_SERVER['PATH_INFO'];

      }

      $url_matches_param = array();

      switch ($request_url) {

      case (
         preg_match(
            "/^\/home\/(?<year>\d{4})\/(?<month>\d{2})\/$/",
            $request_url,
            $url_matches_param
         ) ? true : false
      ) :
      case (
         preg_match(
            "/^\/home\/(?<year>\d{4})\/(?<month>\d{2})$/",
            $request_url,
            $url_matches_param
         ) ? true : false
      ) :

         self::demoAction($url_matches_param, $_GET);

         break;

      case '/index.php':
      case '/index.html':
      case '/index':
      case '/':
      case '':

         self::indexAction($url_matches_param, $_GET);

         break;

      default:

         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messenger = new IndievoxErrorMessenger($type, $parameter);
         $error_messenger->printErrorJSON();
         unset($error_messenger);

         break;

      }// end switch ($action_level_one_id)

   }// end function restGet

   /**
    * Dispatch put actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restPut($segments)
   {

      $_PUT = array();
      parse_str(file_get_contents('php://input'), $_PUT);

      $request_url = '/';

      if ( isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/' ) {

         $request_url = $_SERVER['PATH_INFO'];

      }

      $url_matches_param = array();

      switch ($request_url) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messenger = new IndievoxErrorMessenger($type, $parameter);
         $error_messenger->printErrorJSON();
         unset($error_messenger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restPut


   /**
    * Dispatch delete actions
    *
    * @param array $segments Method segments indicate action and resource
    *
    * @return void
    */
   public function restDelete($segments)
   {

      $_DELETE = array();
      parse_str(file_get_contents('php://input'), $_DELETE);

      $request_url = '/';

      if ( isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/' ) {

         $request_url = $_SERVER['PATH_INFO'];

      }

      $url_matches_param = array();

      switch ($request_url) {

      default:
         $type = 'page_not_found';
         $parameter = array("none"=>"none");
         $error_messenger = new IndievoxErrorMessenger($type, $parameter);
         $error_messenger->printErrorJSON();
         unset($error_messenger);
         break;

      }// end switch ($action_level_one_id)

   }// end function restDelete

   /**
    * Method static indexAction
    *
    * @param array $url_matches_param
    * @param array $GET
    *
    * @return void
    */
   public static function indexAction($url_matches_param, $GET)
   {

      print_r($url_matches_param);
      print_r($GET);

   }// end function indexAction

   /**
    * Method static demoAction
    *
    * @param array $url_matches_param
    * @param array $GET
    *
    * @return void
    */
   public static function demoAction($url_matches_param, $GET)
   {

      print_r($url_matches_param);
      print_r($GET);

   }// end function demoAction

}
?>