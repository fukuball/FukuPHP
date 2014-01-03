<?php
/**
 * HomeViewController.php is the controller
 * to dispatch home actions with home view
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
 * HomeViewController.php is the controller
 * to dispatch home actions with home view
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
class HomeViewController
    extends FukuPHPRESTControl
        implements FukuPHPRESTfulInterface
{

    /**
     * Dispatch post actions
     *
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restPost($segments=array(), $request_url='/')
    {
 
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
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restGet($segments=array(), $request_url='/')
    {
 
        $url_matches_param = array();
 
        switch ($request_url) {
 
        case '/index.php':
        case '/index.html':
        case '/index':
        case '/':
        case '':
            echo "test";
            $type = '';
            $parameter = array("none"=>"none");
            $error_messenger = new FukuPHPErrorMessenger($type, $parameter);
            self::getIndexAction($url_matches_param, $_GET);
            break;
 
        default:
            self::pageNotFound();
            break;
 
        }// end switch ($action_level_one_id)
 
    }// end function restGet
 
    /**
     * Dispatch put actions
     *
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restPut($segments=array(), $request_url='/')
    {
 
        $_PUT = array();
        parse_str(file_get_contents('php://input'), $_PUT);
 
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
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restDelete($segments=array(), $request_url='/')
    {
 
        $_DELETE = array();
        parse_str(file_get_contents('php://input'), $_DELETE);
 
        $url_matches_param = array();
 
        switch ($request_url) {
 
        default:
            self::pageNotFound();
            break;
 
        }// end switch ($action_level_one_id)
 
    }// end function restDelete
 
    /**
     * Method static indexAction
     *
     * @param array $url_matches_param # input url_matches_param
     * @param array $GET               # input GET
     *
     * @return void
     */
    public static function getIndexAction($url_matches_param=array(), $GET=array())
    {
 
        $page_title = 'Home Index Page';
        $yield_path = '/view-page/index.php';
        include_once SITE_ROOT.'/view-layout/default-layout.php';
 
    }// end function indexAction

}
?>