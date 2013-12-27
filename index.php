<?php
/**
 * index.php is the controller of whole app
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /
 * @author   Fukuball Lin <fukuball@indievox.com>
 * @license  iNDIEVOX Licence
 * @version  "GIT: <1.0>
 * @link     http://www.indievox.com
 */

require_once dirname(__FILE__)."/config/app-setter.php";

/**
 * index.php is the controller of whole app
 *
 * @category PHP
 * @package  /
 * @author   Fukuball Lin <fukuball@indievox.com>
 * @license  iNDIEVOX Licence
 * @version  Release: <1.0>
 * @link     http://www.indievox.com
 */
class AppContainer extends IndievoxRESTControl
{

   private $_controller = false;
   private $_segments = false;

   /**
    * AppContainer construct
    *
    * @return void
    */
   function __construct()
   {

      if (  !isset($_SERVER['PATH_INFO']) 
         || $_SERVER['PATH_INFO'] == '/'
         || $_SERVER['PATH_INFO'] == '/index'
         || $_SERVER['PATH_INFO'] == '/index.html'
         || $_SERVER['PATH_INFO'] == '/index.php'
      ) {

         include_once DEFAULT_VIEW_CONTROLLER_PATH;

         $default_view_controller = DEFAULT_VIEW_CONTROLLER;
         $this->_controller = new $default_view_controller;
         $this->_segments = false;

         return;

      }

      $this->_segments = explode('/', $_SERVER['PATH_INFO']);
      array_shift($this->_segments); // first element always is an empty string.
      $the_class_string = array_shift($this->_segments);

      $raw_controller_name_array = explode('-', $the_class_string);
      $controller_name = '';

      foreach ($raw_controller_name_array as $controller_name_partial) {

         $controller_name = $controller_name.ucfirst($controller_name_partial);

      }

      if ( !class_exists($controller_name) ) {

         $controller_file_path 
            = SITE_ROOT . '/view-controller/' . $controller_name . 'ViewController.php';

         if ( file_exists($controller_file_path) ) { // load controler

            include_once $controller_file_path;
            $controller_name = $controller_name.'ViewController';

         } else { // can't find controller

            // find user path

            // or default controller
            include_once DEFAULT_VIEW_CONTROLLER_PATH;
            $controller_name = DEFAULT_VIEW_CONTROLLER;

         }

      }

      $this->_controller = new $controller_name;

   }// end function __construct()

   /**
    * Run AppContainer to get the resource
    *
    * @return void
    */
   function run()
   {

      //request resource by RESTful way.
      //$method = $this->restMethodname;
      $method = 'rest'.ucfirst(strtolower($_SERVER['REQUEST_METHOD']));

      if ( !method_exists($this->_controller, $method) ) {

         self::exceptionResponse(405, 'Method not Allowed!');

      }

      $arguments = $this->_segments;
      $this->_controller->$method($arguments);

   }// end function run

}// end class AppContainer

$app_container = new AppContainer();
$app_container->run();
?>