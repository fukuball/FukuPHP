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
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restGet($segments);
    
    /**
     * Dispatch put actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restPut($segments);
    
    /**
     * Dispatch post actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restPost($segments);
    
    /**
     * Dispatch delete actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restDelete($segments);
    
}// end interface FukuPHPRESTfulInterface
?>