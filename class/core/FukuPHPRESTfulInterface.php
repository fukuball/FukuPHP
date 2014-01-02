<?php
/**
 * FukuPHPRESTfulInterface.php is the interface
 * to describe rest methods
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
 * FukuPHPRESTfulInterface is the interface
 * to describe rest methods
 * 
 * An example of a FukuPHPRESTfulInterface is:
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
interface FukuPHPRESTfulInterface
{
    
    /**
     * Dispatch get actions
     *
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restGet($segments, $request_url);
    
    /**
     * Dispatch put actions
     *
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restPut($segments, $request_url);
    
    /**
     * Dispatch post actions
     *
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restPost($segments, $request_url);
    
    /**
     * Dispatch delete actions
     *
     * @param array  $segments    # segments indicate action and resource
     * @param string $request_url # request url
     *
     * @return void
     */
    public function restDelete($segments, $request_url);
    
}// end interface FukuPHPRESTfulInterface
?>