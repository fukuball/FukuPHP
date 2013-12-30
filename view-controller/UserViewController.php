<?php
/**
 * UserViewController.php is the controller
 * to dispatch user actions with user view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-controller/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

/**
 * UserViewController.php is the controller
 * to dispatch user actions with user view
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-controller/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class UserViewController
   extends FukuPHPRESTControl
      implements FukuPHPRESTfulInterface
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
         self::pageNotFound();
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
            "/^\/(?<path>([a-z0-9_-]+))\/$/",
            $request_url,
            $url_matches_param
         ) ? true : false
      ) :
      case (
         preg_match(
            "/^\/(?<path>([a-z0-9_-]+))$/",
            $request_url,
            $url_matches_param
         ) ? true : false
      ) :
      case (
         preg_match(
            "/^\/user\/(?<user_id>\d+)\/$/",
            $request_url,
            $url_matches_param
         ) ? true : false
      ) :
      case (
         preg_match(
            "/^\/user\/(?<user_id>\d+)$/",
            $request_url,
            $url_matches_param
         ) ? true : false
      ) :

         self::getUserAction($url_matches_param, $_GET);

         break;

      default:
         self::pageNotFound();
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
         self::pageNotFound();
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
         self::pageNotFound();
         break;

      }// end switch ($action_level_one_id)

   }// end function restDelete

   /**
    * Method static getUserAction
    *
    * @param array $url_matches_param
    * @param array $GET
    *
    * @return void
    */
   public static function getUserAction($url_matches_param, $GET)
   {

      if (isset($url_matches_param['user_id'])) {
         $user_id = $url_matches_param['user_id'];
         $user_obj = new User($user_id);
         //$user_obj->path = 'fukuball';
         //$user_obj->save();
         echo "This is user ".$user_obj->path.'<br/>';
         unset($user_obj);  
      } else {
         $user_god_obj = new UserGod();
         $path = $url_matches_param['path'];
         $page_owner_id = $user_god_obj->getUserId($path, 'path');
         $user_obj = new User($page_owner_id);
         echo "This is user ".$user_obj->path.'<br/>';
         unset($user_obj);  
         unset($user_god_obj);  
      }


   }// end function getUserAction

}
?>