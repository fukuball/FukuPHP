<?php
/**
 * FukuPHPAppContainer.php is the controller of whole app
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
 * FukuPHPAppContainer.php is the controller of whole app
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class FukuPHPAppContainer extends FukuPHPRESTControl
{

    private $_controller = false;
    private $_segments = false;
 
    /**
     * FukuPHPAppContainer construct
     *
     * @return void
     */
    function __construct()
    {
 
        if (   !isset($_SERVER['PATH_INFO']) 
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
 
        $controller_file_path 
            = SITE_ROOT . '/view-controller/' . $controller_name . 'ViewController.php';
 
        if ( file_exists($controller_file_path) ) { // load controler
 
            include_once $controller_file_path;
            $controller_name = $controller_name.'ViewController';
 
        } else { // can't find controller
 
            // find user path
            $user_god_obj = new UserGod();
            $page_owner_id = $user_god_obj->getUserId($the_class_string, 'path');
          
            if ($user_god_obj->isExist($page_owner_id)) {
 
                // or default controller
                include_once USER_VIEW_CONTROLLER_PATH;
                $controller_name = USER_VIEW_CONTROLLER;
 
            } else {
 
                // or default controller
                include_once DEFAULT_VIEW_CONTROLLER_PATH;
                $controller_name = DEFAULT_VIEW_CONTROLLER;    
          
            }
 
            unset($user_god_obj);
 
        }
 
        $this->_controller = new $controller_name;
 
    }// end function __construct()
 
    /**
     * Run FukuPHPAppContainer to get the resource
     *
     * @return void
     */
    function run()
    {
 
        //request resource by RESTful way.
        //$method = $this->restMethodname;
        $method = 'rest'.ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
 
        if ( !method_exists($this->_controller, $method) ) {
 
            self::pageNotFound();
 
        } else {

            $arguments = $this->_segments;
            $this->_controller->$method($arguments, $_SERVER['PATH_INFO']);

        }
 
    }// end function run
 
}// end class FukuPHPAppContainer
?>