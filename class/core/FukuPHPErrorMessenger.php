<?php
/**
 * FukuPHPErrorMessenger.php is error messenger class
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
 * FukuPHPErrorMessenger is error messenger class
 *
 * An example of a FukuPHPErrorMessenger is:
 *
 * <code>
 *   $error_messenger_obj = new FukuPHPErrorMessenger();
 * </code>
 *
 * @category PHP
 * @package  /class/core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  Release: <0.0.1>
 * @link     http://www.fukuball.com
 */
class FukuPHPErrorMessenger
{

    protected $version = "0.1";
    protected $type;
    protected $code;
    protected $parameter;
    protected $message;
    public    $readable_title;
    public    $readable_description;
    public    $return_data;
 
    /**
     * Method __construct initialize instance
     *
     * @param string $type      # the error type
     * @param array  $parameter # option parameter to use
     *
     * @return void
     */
    public function __construct($type, $parameter)
    {
 
        try {
 
            $this->type = $this->validateNotEmpty($type);
 
        } catch (Exception $e) {
 
            echo "<h2>".get_class($this)."</h2>";
            echo "<pre>";
            var_dump($e->getMessage());
            echo "</pre>";
            echo "<br>";
            throw new RuntimeException();
 
        }// end try
 
        $this->getMyErrorCode();
        $this->parameter = $parameter;
        $this->return_data = array();
 
    }// end function __construct
 
    /**
     * Method validateNotEmpty validate type not empty
     *
     * @param string $property # the error type
     *
     * @return string $property
     */
    protected function validateNotEmpty($property)
    {
 
        if (empty($property)) {
 
            throw new Exception('Empty value exception.');
 
        } else {
 
            return $property;
 
        }
 
    }// end function validateNotEmpty
 
    /**
     * Method getMyErrorCode to initialize some member property
     *
     * @return void
     */
    protected function getMyErrorCode()
    {
 
        switch ($this->type) {

        case 'page_not_found':

            $this->code = "404";
            $this->message = $this->type." - Page not found!";
            $this->readable_title = "您所要前往的頁面不存在";
            $this->readable_description = "你所要前往的頁面不存在，".
                                          "或可能已經被隱藏或刪除，".
                                          "請嘗試上角的搜尋功能，".
                                          "或是利用上方的主選單前往您想去的頁面。";

            break;

        case 'success':

            $this->code = "0";
            $this->message = "Success";
            $this->readable_title = "成功";
            $this->readable_description = "成功！";

            break;

        case 'unknow_error':
        default:

            $this->code = "1";
            $this->message = $this->type." - Error happens!";
            $this->readable_title = "發生未知錯誤";
            $this->readable_description = "發生未知錯誤了！我們會儘快修復，請耐心等待，謝謝！";

            break;

        }// end switch
 
    }// end function getMyErrorCode
 
    /**
     * Method printErrorRedirect print error redirect
     *
     * @param string $url # input url
     *
     * @return void
     */
    public function printErrorRedirect($url='')
    {

        $error_parameter = $this->parameter;

        if ($url == '') {
            $error_redirect_url = SITE_HOST.'/error.html?error_type='.$this->type;
        } else {
            $error_redirect_url = $url;
        }


        include SITE_ROOT.'/view-component/error-messenger/error-redirect.php';
 
    }// end function printErrorRedirect
 
    /**
     * Method printErrorJSON print error json
     *
     * @return void
     */
    public function printErrorJSON()
    {
 
        $version = $this->version;
        $error_code = $this->code;
        $error_type = $this->type;
        $message = $this->message;
        $parameter = $this->parameter;
        $return_data = $this->return_data;

        include SITE_ROOT.'/view-component/error-messenger/error-json.php';
 
    }// end function printErrorJSON
 
    /**
     * Method printErrorText print error text
     *
     * @return void
     */
    public function printErrorText()
    {
 
        $error_title = $this->readable_title;
        $error_description = $this->readable_description;

        include SITE_ROOT.'/view-component/error-messenger/error-text.php';
 
    }// end function printErrorJSON
 
    /**
     * Method setReturnData
     *
     * @param string $key   # input key
     * @param mix    $value # input value
     *
     * @return void
     */
    public function setReturnData($key, $value)
    {
 
        $this->return_data[$key] = $value;
 
    }// end function setReturnData
 
    /**
     * Method __destruct unset instance value
     *
     * @return void
     */
    public function __destruct()
    {
 
        unset($this->version);
        unset($this->type);
        unset($this->code);
        unset($this->parameter);
        unset($this->message);
        unset($this->readable_title);
        unset($this->readable_description);
 
    }// end function __destruct

}// end class FukuPHPErrorMessenger
?>